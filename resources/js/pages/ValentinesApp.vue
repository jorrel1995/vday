<script setup lang="ts">
import { ref, onMounted } from 'vue';

// No Inertia usage here for static build

const showModal = ref(false);
const isEnvelopeOpen = ref(false);

const openLoveLetter = () => {
    // Open the envelope first
    isEnvelopeOpen.value = true;
    
    // Wait for animation, then show modal
    setTimeout(() => {
        showModal.value = true;
    }, 800);
};

const closeModal = () => {
    showModal.value = false;
    // Reset envelope after a moment so it's closed if they come back
    setTimeout(() => {
        isEnvelopeOpen.value = false;
    }, 500);
};

const faqs = [
    {
        question: "Why did you receive this?",
        answer: "Because you are special and deserve some appreciation."
    },
    {
        question: "What do you mean to me?",
        answer: "You mean everything to me. I would eat a tomato and drink supermalt to keep you happy."
    },
    {
        question: "Did you read and like the letter?",
        answer: "Yes you did! (Oop)"
    },
    {
        question: "Something you should know?",
        answer: "You are beautiful and have a man from Birmingham thinking about you regular 🌹"
    }
];

const openFaq = ref<number | null>(null);

const toggleFaq = (index: number) => {
    openFaq.value = openFaq.value === index ? null : index;
};

// --- Typewriter Effect ---
const headingText = "Happy Valentine's Day Rianna";
const displayedText = ref("");
const subHeadingText = "Although I can't touch you, I can send you gratitude and love, my babygirl x";
const displayedSubText = ref("");
const isTyping = ref(true);
const isSubTyping = ref(true);

const startTypewriter = () => {
    let i = 0;
    // Type Heading First
    const headingInterval = setInterval(() => {
        if (i < headingText.length) {
            displayedText.value += headingText.charAt(i);
            i++;
        } else {
            clearInterval(headingInterval);
            isTyping.value = false;
            
            // Then Type Subheading
            let j = 0;
            const subInterval = setInterval(() => {
                if (j < subHeadingText.length) {
                    displayedSubText.value += subHeadingText.charAt(j);
                    j++;
                } else {
                    clearInterval(subInterval);
                    isSubTyping.value = false;
                }
            }, 50); // Slightly faster for longer text
        }
    }, 100);
};

onMounted(() => {
    startTypewriter();
});

</script>

<template>
    <div class="min-h-screen font-sans overflow-hidden relative selection:bg-pink-200 bg-gradient-mesh">
        
        <!-- Floating Hearts Background -->
        <div class="hearts-bg absolute inset-0 overflow-hidden pointer-events-none">
            <div v-for="n in 20" :key="n" class="heart-float" :style="`--delay: ${Math.random() * 5}s; --left: ${Math.random() * 100}%; --duration: ${6 + Math.random() * 4}s`">
                ❤️
            </div>
        </div>

        <div class="relative z-10 container mx-auto px-4 py-8 flex flex-col items-center justify-center min-h-screen">
            
            <!-- Hero Section -->
            <div class="text-center mb-12 space-y-4 w-full max-w-4xl">
                <!-- Responsive Title Size -->
                <h1 class="text-4xl md:text-7xl font-bold text-pink-600 drop-shadow-sm h-20 md:h-32 flex items-center justify-center px-2">
                    {{ displayedText }}<span v-if="isTyping" class="animate-blink">|</span>
                </h1>
                <p class="text-lg md:text-2xl text-pink-800 max-w-xl mx-auto opacity-90 px-4 min-h-[3rem]">
                    {{ displayedSubText }}<span v-if="!isTyping && isSubTyping" class="animate-blink">|</span>
                </p>

                <!-- Envelope Button (Tap to Open) -->
                <div class="pt-8 flex justify-center perspective-1000 animate-fade-in-up delay-700">
                    <div 
                        @click="openLoveLetter"
                        class="envelope-container cursor-pointer transform transition-transform duration-300 active:scale-95"
                    >
                        <!-- Mobile sized envelope (slightly smaller on very small screens if needed, but w-64 is safe) -->
                        <div class="envelope bg-pink-500 w-64 h-40 relative shadow-xl rounded-b-lg flex items-center justify-center overflow-hidden">
                            <!-- Flap -->
                            <div 
                                class="absolute top-0 w-0 h-0 border-l-[128px] border-l-transparent border-r-[128px] border-r-transparent border-t-[80px] border-t-pink-600 origin-top transition-transform duration-700 z-20"
                                :class="{ '-rotate-x-180': isEnvelopeOpen }"
                            ></div>
                            
                            <!-- Letter peeking out -->
                            <div 
                                class="absolute top-2 w-56 h-32 bg-white rounded shadow-sm transform transition-transform duration-700 z-10 flex items-start justify-center pt-2"
                                :class="{ '-translate-y-12': isEnvelopeOpen }"
                            >
                                <span class="text-xs text-pink-400 mt-2">Read me...</span>
                            </div>
                            
                            <!-- Front Body -->
                            <div class="absolute bottom-0 w-0 h-0 border-l-[128px] border-l-pink-400 border-r-[128px] border-r-pink-400 border-t-[80px] border-t-transparent border-b-[80px] border-b-pink-400 rounded-b-lg z-20 pointer-events-none"></div>
                            
                            <span 
                                class="relative z-30 text-white font-bold text-lg drop-shadow-md transition-opacity duration-300"
                                :class="{ 'opacity-0': isEnvelopeOpen }"
                            >
                                Tap to Open 💌
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="w-full max-w-lg bg-white/60 backdrop-blur-md rounded-3xl shadow-xl border border-pink-100 p-5 animate-fade-in-up delay-1000 mx-4">
                <h2 class="text-2xl font-bold text-pink-600 mb-6 text-center flex items-center justify-center gap-2">
                    <span>FAQs</span>
                    <span class="text-xl">💘</span>
                </h2>
                
                <div class="space-y-3">
                    <div 
                        v-for="(faq, index) in faqs" 
                        :key="index"
                        class="border-b border-pink-100 last:border-0"
                    >
                        <button 
                            @click="toggleFaq(index)"
                            class="w-full flex items-center justify-between py-3 text-left focus:outline-none focus:bg-pink-50/50 rounded-lg px-2 transition-colors"
                        >
                            <span class="text-base font-medium text-pink-800">
                                {{ faq.question }}
                            </span>
                            <span 
                                class="text-pink-400 transform transition-transform duration-300 ml-2"
                                :class="{ 'rotate-180': openFaq === index }"
                            >
                                ▼
                            </span>
                        </button>
                        <transition
                            enter-active-class="transition-all duration-300 ease-out"
                            enter-from-class="opacity-0 max-h-0"
                            enter-to-class="opacity-100 max-h-40"
                            leave-active-class="transition-all duration-200 ease-in"
                            leave-from-class="opacity-100 max-h-40"
                            leave-to-class="opacity-0 max-h-0"
                        >
                            <div v-show="openFaq === index" class="overflow-hidden px-2">
                                <p class="pb-3 text-pink-700/80 leading-relaxed text-sm">
                                    {{ faq.answer }}
                                </p>
                            </div>
                        </transition>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-12 text-center animate-fade-in-up delay-1000">
                <p class="text-pink-600/70 text-sm">
                    Made with ❤️ by Jorrel
                </p>
            </div>

        </div>

        <!-- Modal -->
        <transition name="modal-pop">
            <div v-if="showModal" class="fixed inset-0 z-50 flex items-center justify-center p-4">
                <!-- Backdrop -->
                <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" @click="closeModal"></div>
                
                <!-- Modal Content -->
                <div class="relative bg-white paper-texture rounded-xl shadow-2xl w-full max-w-sm max-h-[85vh] overflow-y-auto p-6 text-center border-4 border-pink-200 transform transition-all">
                    <button @click="closeModal" class="sticky top-0 right-0 float-right ml-auto text-pink-400 hover:text-pink-600 text-3xl font-bold z-50 p-2 leading-none">
                        &times;
                    </button>
                    
                    <div class="text-5xl mb-4 animate-bounce mt-4 text-center">❤️</div>
                    <h2 class="text-xl font-bold text-pink-600 mb-4 font-serif text-center">My Love Letter</h2>
                    
                    <div class="space-y-3 text-pink-800 leading-relaxed text-base font-serif text-center">
                        <p>
                            I know we are not spending it together and we are miles apart, but I want you to know that I am thinking
                            of you today, yesterday and tomorrow.
                        </p>
                        <p>
                            I think the world of you and you are a priority in my life. I adore you from head to toe, and I can't
                            wait to be with you again.
                        </p>
                        <p>
                            You make me think on how to be a better man for you bi-weekly so I can see you smile more. Not because
                            you don't smile enough but I'm just greedy for your happiness.
                        </p>
                        <p>
                            I am greedy for your smile, greedy for your touch, greedy for your love, greedy for your everything. I
                            am greedy for you.
                        </p>
                        <p>
                            We met in a dessert shop, ironically you are the sweetest thing in my life.
                        </p>
                        <p>
                            I love you differently.
                        </p>
                        <p class="font-bold text-pink-600 mt-6 block text-xl handwriting text-center">
                            Love from Jorrel 🌹💐🍫
                        </p>
                    </div>

                    <!-- Image (Static path for build) -->
                    <img src="/images/love.webp" alt="Special Memory" class="w-32 rounded-xl mx-auto mt-6 shadow-md mb-4" />
                </div>
            </div>
        </transition>

    </div>
</template>

<style scoped>
/* Gradient Mesh Background */
.bg-gradient-mesh {
    background-color: #fce7f3;
    background-image: 
        radial-gradient(at 0% 0%, hsla(330,98%,65%,0.2) 0px, transparent 50%),
        radial-gradient(at 98% 1%, hsla(310,98%,65%,0.2) 0px, transparent 50%),
        radial-gradient(at 0% 100%, hsla(350,98%,65%,0.2) 0px, transparent 50%),
        radial-gradient(at 100% 100%, hsla(330,98%,65%,0.2) 0px, transparent 50%);
    animation: gradient-move 15s ease infinite alternate;
    background-size: 200% 200%;
}

@keyframes gradient-move {
    0% { background-position: 0% 0%; }
    100% { background-position: 100% 100%; }
}

/* Animations */
.animate-blink {
    animation: blink 1s step-end infinite;
}

@keyframes blink {
    0%, 100% { opacity: 1; }
    50% { opacity: 0; }
}

.perspective-1000 {
    perspective: 1000px;
}

/* Envelope Flap Rotation Utility */
.-rotate-x-180 {
    transform: rotateX(180deg);
}

.paper-texture {
    background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.5' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100' height='100' filter='url(%23noise)' opacity='0.05'/%3E%3C/svg%3E");
}

/* Modal Transition */
.modal-pop-enter-active,
.modal-pop-leave-active {
    transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.modal-pop-enter-from,
.modal-pop-leave-to {
    opacity: 0;
    transform: scale(0.8);
}

/* Fade In Up */
.animate-fade-in-up {
    animation: fadeInUp 0.8s ease-out forwards;
    opacity: 0;
    transform: translateY(20px);
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.delay-500 { animation-delay: 0.5s; }
.delay-700 { animation-delay: 0.7s; }
.delay-1000 { animation-delay: 1s; }

/* Floating Hearts */
@keyframes floatUp {
    0% {
        transform: translateY(100vh) scale(0.5) rotate(0deg);
        opacity: 0;
    }
    10% {
        opacity: 0.8;
    }
    100% {
        transform: translateY(-100px) scale(1.2) rotate(360deg);
        opacity: 0;
    }
}

.heart-float {
    position: absolute;
    bottom: -50px;
    left: var(--left);
    font-size: 2rem;
    animation: floatUp var(--duration) linear infinite;
    animation-delay: var(--delay);
    opacity: 0;
}
</style>
