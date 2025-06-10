import { createRouter, createWebHistory} from 'vue-router'

import Dashboard from '../js/Pages/Dashboard.vue'
import PlayersCreate from '../js/Pages/Players/Create.vue'
import PlayersDeleted from '../js/Pages/Players/Deleted.vue'
import PlayersEdit from '../js/Pages/Players/Edit.vue'
import PlayersFavorites from '../js/Pages/Players/Favorites.vue'
import PlayersIndex from '../js/Pages/Players/Index.vue'
import PlayersShow from '../js/Pages/Players/Show.vue'
import TeamsIndex from '../js/Pages/Teams/Index.vue'
import TeamsShow from '../js/Pages/Teams/Show.vue'

const routes = [
  { path: '/', component: Dashboard },
  { path: '/teams/:team_id/players/create', component: PlayersCreate },
  { path: '/teams/:team_id/players/deleted', component: PlayersDeleted },
  { path: '/teams/:team_id/players/:player_id/edit', component: PlayersEdit },
  { path: '/favorites', component: PlayersFavorites },
  { path: '/teams/:team_id/players', component: PlayersIndex },
  { path: '/teams/:team_id/players/:player_id', component: PlayersShow },
  { path: '/teams', component: TeamsIndex },
  { path: '/teams/:team_id', component: TeamsShow },
]

const router = createRouter({
    history: createWebHistory('/npb-directory-Laravel/'),
    routes,
})

export default router