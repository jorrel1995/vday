<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';

const form = useForm({});
const sent = ref(false);
const showConfetti = ref(false);

const sendLoveLetter = () => {
    form.post('/send-love-letter', {
        preserveScroll: true,
        onSuccess: () => {
            sent.value = true;
            showConfetti.value = true;
            // Reset confetti after some time
            setTimeout(() => {
                showConfetti.value = false;
            }, 5000);
        },
    });
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

// Falling hearts animation logic could go here or just CSS
</script>

<template>
    <Head title="Be My Valentine?" />

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
                    Although i cant touch you, i can send you a message of love.
                </p>

                <div class="pt-8">
                    <transition name="fade" mode="out-in">
                        <div v-if="!sent" key="button">
                            <button 
                                @click="sendLoveLetter"
                                :disabled="form.processing"
                                class="group relative px-8 py-4 bg-pink-500 hover:bg-pink-600 text-white text-xl font-bold rounded-full shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 disabled:opacity-70 disabled:cursor-not-allowed overflow-hidden"
                            >   
                                <span class="relative z-10 flex items-center gap-2">
                                    Send Love Letter 💌
                                    <span v-if="form.processing" class="animate-spin">⏳</span>
                                </span>
                                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                            </button>
                        </div>
                        <div v-else key="success" class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-xl border-2 border-pink-200">
                            <h2 class="text-3xl font-bold text-pink-600 mb-2">Message Sent! 📮</h2>
                            <p class="text-lg text-pink-700">Check your inbox for a surprise.</p>
                            <button @click="sent = false" class="mt-4 text-sm text-pink-500 hover:text-pink-700 underline">
                                Send another one?
                            </button>
                        </div>
                    </transition>
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
    transition: opacity 0.5s ease, transform 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
    transform: translateY(20px);
}
</style>
