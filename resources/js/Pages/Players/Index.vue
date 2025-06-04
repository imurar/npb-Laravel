<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
  players: Array,
  team: Object, 
});
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h1>選手一覧</h1>
        </template>

        <div>
            <table border="1" cellpadding="5">
                <thead>
                    <tr>
                        <th>背番号</th>
                        <th>名前</th>
                        <th>ポジション</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="player in props.players" :key="player.id">
                        <td>
                            <Link :href="route('players.show', {team_id: props.team.id, player_id: player.id})">
                                {{ player.uniform_no }}
                            </Link>
                        </td>
                        <td>
                            <Link :href="route('players.show', {team_id: props.team.id, player_id: player.id})">    
                                {{ player.name }}
                            </Link>
                        </td>
                        
                        <td>{{ player.position?.name ?? '' }}</td>
                    </tr>
                </tbody>
            </table>
            <Link :href="route('teams.show', { team_id: props.team.id})">戻る</Link><br /> 
        </div>
    </AuthenticatedLayout>
</template>

