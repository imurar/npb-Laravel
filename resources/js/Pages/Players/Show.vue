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
    <Head title="選手詳細" />
    
    <AuthenticatedLayout>
        <template #header>
            <h1 class="text-2xl font-bold text-center mb-6">選手詳細</h1>
        </template>

        <div class="max-w-md mx-auto bg-white p-6 rounded shadow space-y-4">
            <div class="text-center">
                <button @click="toggleFavorite" :disabled="form.processing"
                    class="text-2xl focus:outline-none hover:scale-110 transition-transform">
                        {{ props.player.is_favorite ? '★お気に入り': '☆お気に入り追加' }}
                </button>
            </div>    
            
            <div class="space-y-2">
                <p><span class="font-semibold">背番号:</span> {{ props.player.uniform_no }} </p>
                <p><span class="font-semibold">名前:</span> {{ props.player.name }} </p>
                <p><span class="font-semibold">ポジション:</span> {{ props.player.position.name }} </p>
                <p><span class="font-semibold">球団:</span> {{ props.player.team.name }} </p>
                <p><span class="font-semibold">高校:</span> {{ props.player.highschool || '-' }} </p>
                <p><span class="font-semibold">大学:</span> {{ props.player.university  || '-' }} </p>
                <p><span class="font-semibold">会社:</span> {{ props.player.company  || '-' }} </p>
                <p><span class="font-semibold">誕生日:</span> {{ props.player.birthday   || '-' }} </p>
                <p><span class="font-semibold">出身地(都道府県):</span> {{ props.player.prefecture?.name || '-' }} </p>
                <p><span class="font-semibold">出身地(市区町村):</span> {{ props.player.city?.name || '-' }} </p>
            </div>
            
            <div class="mt-6 space-y-3">
                <Link :href="route('players.edit', {'team_id': props.team.id, 'player_id': props.player.id})"
                    class="block w-full text-center bg-yellow-500 hover:bg-yellow-600 text-white py-2 rounded transition">
                    編集
                </Link>

                <button @click="destroy" :disabled="form.processing"
                    class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded transition disabbled:opacity-50">
                    削除
                </button>

                <Link :href="route('players.index', {'team_id': props.team.id})"
                    class="block w-full text-center text-blue-600 hover:underline">
                    選手一覧に戻る
                </Link>

                <Link :href="route('dashboard')"
                    class="block w-full text-center text-blue-600 hover:underline">
                    トップページ
                </Link>
            </div>
        </div>
    </AuthenticatedLayout>
</template>