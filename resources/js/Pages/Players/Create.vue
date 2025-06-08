<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps ({ 
    teams:Array,
    team:Object,
    positions: Array,
    prefectures: Array,
    citys: Array,
});

const form = useForm({
    uniform_no: '',
    name: '',
    position_id: '',
    highschool: '',
    university: '',
    birthday: '',
    prefecture_id: '',
    city_id: '',
});

const { errors } = form;

</script>

<template>
    <Head title="選手登録" />

    <AuthenticatedLayout>
        <template #header>
            <h1 class="text-2xl font-bold text-center mb-6">選手登録画面</h1>
        </template>
            
        
        <div v-if="Object.keys(errors).length" class="mb-4 text-red-600">
            <ul>
                <li v-for="(message, key) in errors" :key="key">{{ message }}</li>
            </ul>
        </div>
        
        <h2 class="mb-6 text-lg font-semibold text-center py-8\">球団: {{ team.name }}</h2>

        <form @submit.prevent="form.post(route('players.store', { team_id: props.team.id }))" class="max-w-md mx-auto space-y-6 bg-white p-6 rounded shadow">
            <div class="flex flex-col">
                <label for="uniform_no" class="mb-1 font-medium">背番号:</label>
                <input id="uniform_no" type="text" v-model="form.uniform_no" class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>

            <div class="flex flex-col">
                <label for="name" class="mb-1 font-medium">名前:</label>
                <input id="name" type="text" v-model="form.name" class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>

            <div class="flex flex-col">
                <label for="position_id" class="mb-1 font-medium">ポジション:</label>
                <select id="position_id" v-model="form.position_id" class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="" disabled selected>選択してください</option>
                    <option v-for="position in props.positions" :key="position.id" :value="position.id">
                        {{ position.name }}
                    </option>
                </select>
            </div>


            <div class="flex flex-col">
                <label for="highschool" class="mb-1 font-medium">高校:</label>
                <input id="highschool" type="text" v-model="form.highschool" class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>

            <div class="flex flex-col">
                <label for="university" class="mb-1 font-medium">大学:</label>
                <input id="university" type="text" v-model="form.university" class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>

            <div class="flex flex-col">
                <label for="birthday" class="mb-1 font-medium">誕生日:</label>
                <input id="birthday" type="date" v-model="form.birthday" class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>

            <div class="flex flex-col">
                <label for="prefecture_id" class="mb-1 font-medium">出身地(都道府県):</label>
                <select id="prefecture_id" v-model="form.prefecture_id" class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="" disabled selected>選択してください</option>
                    <option v-for="prefecture in props.prefectures" :key="prefecture.id" :value="prefecture.id">
                        {{ prefecture.name }}
                    </option>
                </select>
            </div>

            <div class="flex flex-col">
                <label for="city_id" class="mb-1 font-medium">出身地(市区町村):</label>
                <select id="city_id" v-model="form.city_id" class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="" disabled selected>選択してください</option>
                    <option v-for="city in props.citys" :key="city.id" :value="city.id">
                        {{ city.name }}
                    </option>
                </select>
            </div>

            <button type="submit" :disabled="form.processing" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition-colors">
                登録
            </button>
        </form>

        <div class="mt-6 text-center">
            <Link :href="route('teams.show', { team_id: team.id })" class="text-blue-600 hover:underline">戻る</Link>
        </div>
    </AuthenticatedLayout>
</template>