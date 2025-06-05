<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm, router } from '@inertiajs/vue3';

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
    <AuthenticatedLayout>
        <template #header>
            <h1>削除された選手一覧</h1>
        </template>

        <div>
            <table border="1" cellpadding="5">
                <thead>
                    <tr>
                        <th>名前</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="player in props.players" :key="player.id">
                        <td>{{ player.name }}</td>
                        <td>
                            <button @click="restore(player)" :disabled="form.processing">復元</button><br />
                        </td>
                    </tr>
                </tbody>
            </table>
            <Link :href="route('players.index', { team_id: props.team_id })">戻る</Link><br />
        </div>
    </AuthenticatedLayout>
</template>