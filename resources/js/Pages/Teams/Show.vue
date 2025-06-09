<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({ 
    team: Object
});
</script>

<template>
    <Head :title="`${team.name} | チーム詳細`" />
    <AuthenticatedLayout>
        <template #header>
            <h1 class="text-2xl font-bold text-center mb-6">{{ team.name }} のページ</h1>
        </template>
        
        <div class="max-w-md mx-auto space-y-4 text-center">
            <Link :href="route('players.index', {team_id: team.id})"
                class="inline-block w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded transition">
                所属選手一覧
            </Link>
            
            <Link :href="route('players.create', {team_id: team.id})"
                class="inline-block w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded transition">
                選手追加
            </Link>
            
            <Link :href="route('teams.index')"
                class="inline-block w-full text-blue-600 hover:underline mt-4">
                戻る
            </Link>
        </div>
    </AuthenticatedLayout>
</template>
