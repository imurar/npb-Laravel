<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
  player: Object,
  team: Object,
});

const form = useForm({});

const destroy = () => {
    if(confirm('本当に削除しますか？')){
        form.delete(route('players.destroy', {
            team_id: props.team.id,
            player_id: props.player.id
        }));
    }
};

const toggleFavorite = async () => {
  try {
    const response = await fetch(route('players.favorite', {team_id: props.team.id, player_id: props.player.id }), {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        'Accept': 'application/json',
      },
    });

    const data = await response.json();
    props.player.is_favorite = data.is_favorite;

  } catch (error) {
    console.error(error);
  }
};

</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h1>選手詳細</h1>
        </template>

        <div>
            <table border="1" cellpadding="5">
                <thead>
                    <tr>
                        <th>背番号</th>
                        <th>名前</th>
                        <th>ポジション</th>
                        <th>球団</th>
                        <th>高校</th>
                        <th>大学</th>
                        <th>誕生日</th>
                        <th>出身地(都道府県)</th>
                        <th>出身地(市区町村)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ props.player.uniform_no }}</td>
                        <td>{{ props.player.name }}</td>
                        <td>{{ props.player.position?.name || '' }}</td>
                        <td>{{ props.player.team?.name || '' }}</td>
                        <td>{{ props.player.highschool }}</td>
                        <td>{{ props.player.university }}</td>
                        <td>{{ props.player.birthday }}</td>
                        <td>{{ props.player.prefecture?.name || '' }}</td>
                        <td>{{ props.player.city?.name || '' }}</td>
                    </tr>
                </tbody>
            </table>
            <button @click="toggleFavorite" :disabled="form.processing">
                {{ props.player.is_favorite ? '★ お気に入り' : '☆ お気に入りに追加' }}
            </button><br />
            <Link :href="route('players.edit', {'team_id': props.team.id, 'player_id': props.player.id})">編集</Link><br />
            <button @click="destroy" :disabled="form.processing">削除</button><br />
            <Link :href="route('players.index', {'team_id': props.team.id})">戻る</Link><br />
            <Link :href="route('dashboard')">トップページ</Link>
        </div>
    </AuthenticatedLayout>
</template>