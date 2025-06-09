<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
  players: Array,
  team_id: [Number, String],
});

const form = useForm({});

const restore = (player) => {
    if(confirm('本当に復元しますか？')){
        form.post(route('players.restore', {
            team_id: props.team_id,
            player_id: player.id
        }));
    }
};
</script>

<template>
    <Head title="削除された選手一覧" />

    <AuthenticatedLayout>
        <template #header>
             <h1 class="text-2xl font-bold text-center mb-6">削除された選手一覧</h1>
        </template>

        <div class="max-w-4xl mx-auto px-4">
            <div v-if="props.players.length === 0" class="mb-6 text-gray-600 text-center">
                削除された選手はいません。
            </div>

            <table class="w-full table-auto border border-gray-300 shadow-sm mb-6">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b text-center">名前</th>
                        <th class="px-4 py-2 border-b text-center">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="player in props.players" :key="player.id" class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b text-center">{{ player.name }}</td>
                        <td class="px-4 py-2 border-b text-center">
                            <button @click="restore(player)" :disabled="form.processing"
                                class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700 disabled:opacity-50">
                                復元
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="flex justify-center mt-4">
                <Link :href="route('players.index', { team_id: props.team_id })"
                    class="text-blue-600 underline hover:text-blue-800">
                    選手一覧に戻る
                </Link>
            </div>
        </div>
    </AuthenticatedLayout>
</template>