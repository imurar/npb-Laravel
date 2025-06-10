<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
  players: Array,
  team: Object, 
});
</script>

<template>
    <Head title="選手一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h1 class="text-2xl font-bold text-center mb-6">選手一覧</h1>
        </template>

        <div class="max-w-3xl mx-auto space-y-4">
            <div v-if="props.players.length" class="space-y-4">
                <div v-for="player in props.players" :key="player.id"
                    class="p-4 border rounded shadow-sm hover:shadow-md transition"> 
                    <Link :href="route('players.show', {team_id: props.team.id, player_id: player.id})"
                        class="block text-lg font-semibold text-blue-700 hover:underline">
                        {{ player.uniform_no }}番 - {{ player.name }}
                    </Link>
                    <p class="text-gray-600">ポジション:{{ player.position.name }}</p>
                </div>
            </div>

            <div v-else class="text-center text-gray-500">
                選手が登録されていません。
            </div>

            <div class="mt-6 space-y-3">
                <Link :href="route('players.deleted', { team_id: props.team.id})"
                    class="block text-center text-red-600 hover:underline">
                    削除された選手を見る
                </Link>

                <Link :href="route('teams.show', { team_id: props.team.id})"
                    class="block text-center text-blue-600 hover:underline">
                    チーム詳細に戻る
                </Link>

                <Link :href="route('favorites.index')"
                    class="block text-center text-yellow-600 hover:underline">
                    お気に入り選手一覧
                </Link>
                
                <Link :href="route('dashboard')"
                    class="block text-center text-blue-600 hover:underline">
                    トップページへ
                </Link>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

