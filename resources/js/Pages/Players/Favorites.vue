<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    players: Array,
});

</script>

<template>
    <Head title="お気に入り選手一覧" />
    <AuthenticatedLayout>
        <template #header>
            <h1 class="text-xl font-bold text-center">お気に入り選手一覧</h1>
        </template>
        <div class="max-w-3xl mx-auto px-4">
            <table v-if="players.length" class="table-auto border-collapse border border-gray-300 w-full">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-center">名前</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">チーム</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="player in players" :key="player.id" class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2 text-center">
                                <Link :href="route('players.show', {team_id: player.team.id, player_id: player.id})"
                                    class="block text-lg font-semibold text-blue-700 hover:underline"> 
                                    {{ player.name }}
                                </Link>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ player.team.name }}</td>
                    </tr>
                </tbody>
            </table>

            <p v-else class="text-center text-gray-500 mt-6">お気に入り選手が登録されていません。</p>
            
            <div class="text-center mt-6">
                <Link :href="route('dashboard')" class="text-blue-600 hover:underline">
                    トップページへ戻る
                </Link>
            </div>
        </div>
    </AuthenticatedLayout>
</template>