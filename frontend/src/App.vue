<template>
  <div>
    <nav>
      <router-link to="/">Dashboard</router-link><br />
      <router-link to="/teams/2/players/create">PlayersCreate</router-link><br />
      <router-link to="/teams/2/players/deleted">PlayersDeleted</router-link><br />
      <router-link to="/teams/2/players/1/edit">PlayersEdit</router-link><br />
      <router-link to="/favorites">PlayersFavorites</router-link><br />
      <router-link to="/teams/2/players">PlayersIndex</router-link><br />
      <router-link to="/teams/2/players/1">PlayersShow</router-link><br />
      <router-link to="/teams">TeamsIndex</router-link><br />
      <router-link to="/teams/2">TeamsShow</router-link><br />
    </nav>
    <router-view />
  </div>
</template>