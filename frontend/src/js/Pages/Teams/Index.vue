<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps ({ teams: Array, });
</script>

<template>
    <Head title="球団一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h1 class="text-2xl font-bold text-center mb-6">球団一覧</h1>
        </template>
            
        <div class="max-w-3xl mx-auto">
            <table v-if="teams.length" class="table-auto border-collapse border border-gray-300 w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2 text-center">球団名</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="team in teams" :key="team.id" class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <Link :href="route('teams.show', {team_id: team.id})"
                                class="text-blue-600 hover:underline">
                                {{ team.name }}
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p v-else class="text-center text-gray-500 mt-6">球団が登録されていません。</p>
            <div class="text-center mt-6">
                <Link :href="route('dashboard')" class="inline-block text-blue-600 hover:underline">
                    トップページへ戻る
                </Link>
            </div>
        </div> 
    </AuthenticatedLayout>
</template>