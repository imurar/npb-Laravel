<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({ 
    team:Object
});
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h1>{{ team.name }}ページ</h1>
        </template>
        
        <Link :href="route('players.index', {team_id: team.id})">所属選手一覧</Link><br />
        <Link :href="route('players.create', {team_id: team.id})">選手追加</Link><br />
        <Link :href="route('teams.index')">戻る</Link><br /> 
    </AuthenticatedLayout>
</template>
