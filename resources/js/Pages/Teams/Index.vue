<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps ({ teams:Array, });
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h1>球団一覧</h1>
        </template>
            
        <div>
            <table border="1" cellpadding="5">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>球団名</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="team in teams" :key="team.id">
                        <td>{{ team.id }}</td>
                        <td>
                            <Link :href="route('teams.show', {team_id: team.id})">
                                {{ team.name }}
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
            <Link :href="route('dashboard')">戻る</Link><br /> 
        </div> 
    </AuthenticatedLayout>
</template>