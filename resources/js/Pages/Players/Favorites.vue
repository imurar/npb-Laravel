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
            <h1 class="text-xl font-bold">お気に入り選手一覧</h1>
        </template>
        <div>
            <table border="1" cellpadding="5">
                <thead>
                    <tr>
                        <th>名前</th>
                        <th>チーム</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="player in props.players" :key="player.id">
                        <td>{{ player.name}}</td>
                        <td>{{ player.team.name }}</td>
                    </tr>
                </tbody>
            </table>
            <Link :href="route('dashboard')">トップページへ戻る</Link><br />
        </div>
    </AuthenticatedLayout>
</template>