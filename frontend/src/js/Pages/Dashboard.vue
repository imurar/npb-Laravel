<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';

const { props } = usePage();
const auth = props.auth;
</script>

<template>
    <Head title="トップページ" />

    <AuthenticatedLayout>
        <template #header>
            <h1 class="text-3xl font-bold text-center mb-6">
                <p>ようこそ、{{ auth.user.name }} さん！</p>
            </h1>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
                <div class="bg-white shadow rounded-lg p-6">
                
                    <div v-if="props.flash?.status" class="mb-6 p-4 text-green-800 bg-green-100 border border-green-300 rounded">
                        {{ props.flash.status }}
                    </div>

                    <h2 class="text-2xl font-semibold mb-4 text-center">プロ野球選手名鑑</h2>
                    <nav class="space-y-4 text-center">
                        <Link :href="route('teams.index')"
                            class="block text-blue-600 hover:underline text-lg">
                            球団一覧
                        </Link>
                        <Link :href="route('favorites.index')"
                            class="block text-blue-600 hover:underline text-lg">
                            お気に入り選手一覧
                        </Link>
                    </nav>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
