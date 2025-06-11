<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import axios from 'axios';

const props = defineProps({
    player: Object,
    team: Object,
    positions: Array,
    prefectures: Array,
    citys: Array,
    errors: Object,
});


const form = useForm({
    uniform_no: props.player.uniform_no || '',
    name: props.player.name || '',
    position_id: props.player.position_id || '',
    highschool: props.player.highschool || '',
    university: props.player.university || '',
    company: props.player.company || '',
    birthday: props.player.birthday || '',
    prefecture_id: props.player.prefecture_id || '',
    city_id: props.player.city_id || '',
});

const citys = ref(props.citys);

watch(() => form.prefecture_id, async (newPrefId) => {
    if(newPrefId) {
        try{
            const response = await axios.get(`/api/prefectures/${newPrefId}/citys`);
            console.log('API response:', response.data); 
            citys.value = response.data;
            form.city_id = '';
        } catch (error) {
            console.log('市区町村の取得に失敗しました。', error);
        }
    } else {
        citys.value = [];
        form.city_id = '';
    }
});

const { errors } = form;

const submit = () => {
    if(confirm('本当に更新しますか？')){
        form.put(route('players.update', {
            team_id: props.team.id,
            player_id: props.player.id
        }));
    }
};
</script>

<template>
    <Head title="選手情報編集" />

    <AuthenticatedLayout>
        <template #header>
            <h1 class="text-2xl font-bold text-center mb-6">選手情報編集画面</h1>
        </template>

        <div class="max-w-md mx-auto px-4 bg-white p-6 rounded shadow">
            <div v-if="Object.keys(errors).length" class="mb-4 text-red-600">
                <ul>
                    <li v-for="(message, key) in errors" :key="key">{{ message }}</li>
                </ul>
            </div>
        
            <h2 class="text-lg font-semibold mb-4 text-center">球団: {{ props.team.name }}</h2>

            <form @submit.prevent="submit" class="space-y-6">
                <div class="flex flex-col">
                    <label class="mb-1 font-medium">背番号:</label>
                    <input type="text" v-model="form.uniform_no"
                        class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    />
                </div>

                <div class="flex flex-col">
                    <label class="mb-1 font-medium">名前:</label>
                    <input type="text" v-model="form.name"
                        class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    />
                </div>

                <div class="flex flex-col" >
                    <label class="mb-1 font-medium">ポジション:</label>
                    <select v-model="form.position_id"
                        class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    >
                        <option value="" disabled>選択してください</option>
                        <option v-for="position in props.positions" :key="position.id" :value="position.id">
                            {{ position.name }}
                        </option>
                    </select>
                </div>

                <div class="flex flex-col">
                    <label class="mb-1 font-medium">高校:</label>
                    <input type="text" v-model="form.highschool"
                        class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    />
                </div>
        
                <div class="flex flex-col">
                    <label class="mb-1 font-medium">大学:</label>
                    <input type="text" v-model="form.university"
                        class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    />
                </div>

                <div class="flex flex-col">
                    <label class="mb-1 font-medium">会社:</label>
                    <input type="text" v-model="form.company"
                        class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    />
                </div>

                <div class="flex flex-col">
                    <label for="birthday" class="mb-1 font-medium">誕生日:</label>
                    <input type="date" v-model="form.birthday"
                        class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" 
                    />
                </div>
            
                <div class="flex flex-col">
                    <label class="mb-1 font-medium">出身地(都道府県):</label>
                    <select v-model="form.prefecture_id"
                        class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    >
                        <option value="" disabled>選択してください</option>
                        <option v-for="prefecture in props.prefectures" :key="prefecture.id" :value="prefecture.id">
                            {{ prefecture.name }}
                        </option>
                    </select>
                </div>
         
                <div class="flex flex-col">
                    <label class="mb-1 font-medium">出身地(市区町村):</label>
                    <select v-model="form.city_id"
                        class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    >
                        <option value="" disabled>選択してください</option>
                        <option v-for="city in citys" :key="city.id" :value="city.id">
                            {{ city.name }}
                        </option>
                    </select>
                </div>

                 <div class="mt-6 flex flex-col gap-4 items-center">
                    <button type="submit" :disabled="form.processing"
                        class="w-full bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 disabled:opacity-50">
                        更新
                    </button>

                    <Link :href="route('players.show', { team_id: props.team.id, player_id: props.player.id })"
                        class="text-blue-600 hover:underline text-blue-800">
                        選手詳細に戻る
                    </Link>
                </div>    
            </form>
        </div>
    </AuthenticatedLayout>
</template>
