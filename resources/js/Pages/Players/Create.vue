<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps ({ 
    teams:Array,
    team:Object,
    positions: Array,
    prefectures: Array,
    citys: Array,
    errors: Object,
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
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h1>選手登録画面</h1>
        </template>
            
        
        <div v-if="Object.keys(errors).length" style="color: red;">
            <ul>
                <li v-for="(message, key) in errors" :key="key">{{ message }}</li>
            </ul>
        </div>
        
        <label> 球団: {{ team.name }} </label>
        <form @submit.prevent="form.post(route('players.store', { team_id: props.team.id }))">
            <label>
                背番号:
                <input type="text" v-model="form.uniform_no" />
            </label><br />

            <label>
                名前:
                <input type="text" v-model="form.name" />
            </label><br />

            <label>
                ポジション:
                <select v-model="form.position_id">
                    <option value="" disabled>選択してください</option>
                    <option v-for="position in props.positions" :key="position.id" :value="position.id">
                        {{ position.name }}
                    </option>
                </select>
            </label><br />

            <label>
                高校:
                <input type="text" v-model="form.highschool" />
            </label><br />

            <label>
                大学:
                <input type="text" v-model="form.university" />
            </label><br />

            <label>
                誕生日:
                <input type="text" v-model="form.birthday" />
            </label><br />

            <label>
                出身地(都道府県):
                <select v-model="form.prefecture_id">
                    <option value="" disabled>選択してください</option>
                    <option v-for="prefecture in props.prefectures" :key="prefecture.id" :value="prefecture.id">
                        {{ prefecture.name }}
                    </option>
                </select>
            </label><br />

            <label>
                出身地(市区町村):
                <select v-model="form.city_id">
                    <option value="" disabled>選択してください</option>
                    <option v-for="city in props.citys" :key="city.id" :value="city.id">
                        {{ city.name }}
                    </option>
                </select>
            </label><br />

            <button type="submit" :disabled="form.processing">登録</button>
        </form>
        
        <Link :href="route('teams.show', { team_id: team.id })">戻る</Link>
    </AuthenticatedLayout>
</template>