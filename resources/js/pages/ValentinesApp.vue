<script setup lang="ts">
import { ref } from 'vue';

// No Inertia usage here for static build
// import { Head, useForm } from '@inertiajs/vue3'; 

const showModal = ref(false);

const openLoveLetter = () => {
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};

const faqs = [
    {
        question: "Why did you receive this?",
        answer: "Because you are special to me and deserve some appreciation."
    },
    {
        question: "What do you mean to you?",
        answer: "You mean everything to me. I would eat a tomato and drink supermalt to keep you happy."
    },
    {
        question: "Did you click the button?",
        answer: "Yes I did! (I hope)"
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
</script>

<template>
    <!-- <Head title="Be My Valentine?" /> Removed for static build -->

    <div class="min-h-screen bg-pink-50 text-pink-900 font-sans overflow-hidden relative selection:bg-pink-200">
        <!-- Floating Hearts Background -->
        <div class="hearts-bg absolute inset-0 overflow-hidden pointer-events-none">
            <div v-for="n in 20" :key="n" class="heart-float" :style="`--delay: ${Math.random() * 5}s; --left: ${Math.random() * 100}%; --duration: ${6 + Math.random() * 4}s`">
                ❤️
            </div>
        </div>

        <div class="relative z-10 container mx-auto px-4 py-12 flex flex-col items-center justify-center min-h-screen">
            
            <!-- Hero Section -->
            <div class="text-center mb-16 space-y-6">
                <h1 class="text-5xl md:text-7xl font-bold text-pink-600 drop-shadow-sm animate-pulse-slow">
                    Happy Valentine's Day Rianna
                </h1>
                <p class="text-xl md:text-2xl text-pink-800 max-w-2xl mx-auto opacity-90">
                    Although I can't touch you, I can send you a message of love.
                </p>

                <div class="pt-8">
                    <button 
                        @click="openLoveLetter"
                        class="group relative px-8 py-4 bg-pink-500 hover:bg-pink-600 text-white text-xl font-bold rounded-full shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden"
                    >   
                        <span class="relative z-10 flex items-center gap-2">
                            Open Love Letter 💌
                        </span>
                        <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                    </button>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="w-full max-w-2xl bg-white/60 backdrop-blur-md rounded-3xl shadow-xl border border-pink-100 p-6 md:p-8">
                <h2 class="text-3xl font-bold text-pink-600 mb-8 text-center flex items-center justify-center gap-3">
                    <span>Questions of the Heart</span>
                    <span class="text-2xl">💘</span>
                </h2>
                
                <div class="space-y-4">
                    <div 
                        v-for="(faq, index) in faqs" 
                        :key="index"
                        class="border-b border-pink-100 last:border-0"
                    >
                        <button 
                            @click="toggleFaq(index)"
                            class="w-full flex items-center justify-between py-4 text-left focus:outline-none group"
                        >
                            <span class="text-lg font-medium text-pink-800 group-hover:text-pink-600 transition-colors">
                                {{ faq.question }}
                            </span>
                            <span 
                                class="text-pink-400 transform transition-transform duration-300"
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
                            <div v-show="openFaq === index" class="overflow-hidden">
                                <p class="pb-4 text-pink-700/80 leading-relaxed">
                                    {{ faq.answer }}
                                </p>
                            </div>
                        </transition>
                    </div>
                </div>
            </div>

        </div>

        <!-- Modal -->
        <transition name="fade">
            <div v-if="showModal" class="fixed inset-0 z-50 flex items-center justify-center p-4">
                <!-- Backdrop -->
                <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" @click="closeModal"></div>
                
                <!-- Modal Content -->
                <div class="relative bg-white rounded-3xl shadow-2xl max-w-lg w-full max-h-[90vh] overflow-y-auto p-8 text-center border-4 border-pink-200">
                    <button @click="closeModal" class="absolute top-4 right-4 text-pink-400 hover:text-pink-600 text-2xl font-bold">
                        &times;
                    </button>
                    
                    <div class="text-5xl mb-6">❤️</div>
                    <h2 class="text-2xl font-bold text-pink-600 mb-6 font-serif">Happy Valentine's Day Anna!</h2>
                    
                    <div class="space-y-4 text-pink-800 leading-relaxed text-lg">
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
                        <p class="font-bold text-pink-600 mt-6 block">
                            Love from Jorrel 🌹💐🍫
                        </p>
                    </div>

                    <!-- Image (Static path for build) -->
                    <!-- Note: You need to make sure this image is in 'public/images/love.webp' -->
                     <!-- Since we are building static, standard src works -->
                    <img src="/images/love.webp" alt="Special Memory" class="w-40 rounded-xl mx-auto mt-6 shadow-md" />
                </div>
            </div>
        </transition>

    </div>
</template>

<style scoped>
/* Custom Animations */
@keyframes floatUp {
    0% {
        transform: translateY(100vh) scale(0.5);
        opacity: 0;
    }
    10% {
        opacity: 0.8;
    }
    100% {
        transform: translateY(-100px) scale(1.2);
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

@keyframes pulse-slow {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.animate-pulse-slow {
    animation: pulse-slow 3s ease-in-out infinite;
}

/* Transitions */
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
