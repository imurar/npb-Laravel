<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, useForm, router } from '@inertiajs/vue3';

const props = defineProps({
    player: Object,
    team: Object,
    positions: Array,
    prefectures: Array,
    citys: Array,
    errors: Object,
});

const player = props.player;

const form = useForm({
    uniform_no: props.player.uniform_no || '',
    name: props.player.name || '',
    position_id: props.player.position_id || '',
    highschool: props.player.highschool || '',
    university: props.player.university || '',
    birthday: props.player.birthday || '',
    prefecture_id: props.player.prefecture_id || '',
    city_id: props.player.city_id || '',
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
    <AuthenticatedLayout>
        <template #header>
            <h1>選手情報編集画面</h1>
        </template>

        <div v-if="Object.keys(errors).length" style="color: red;">
            <ul>
                <li v-for="(message, key) in errors" :key="key">{{ message }}</li>
            </ul>
        </div>
        
        <label> 球団: {{ team.name }} </label>
        <form @submit.prevent="submit">
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

            <button type="submit" :disabled="form.processing">更新</button>
        </form>
        
        <Link :href="route('players.show', { team_id: props.team.id, player_id: player.id })">戻る</Link>
    </AuthenticatedLayout>
</template>