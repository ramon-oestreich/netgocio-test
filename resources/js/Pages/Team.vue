<template>
    <div class="md:container md:mx-auto mt-8">
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Team</th>
                        <th>Name</th>
                        <th>Played</th>
                        <th>Won</th>
                        <th>Drawn</th>
                        <th>Lost</th>
                        <th>Goal</th>
                        <th>Difference</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="s in season" :key="s.id">
                        <td>{{ s.position }}</td>
                        <td>{{ s.team }}</td>
                        <td>{{ s.name }}</td>
                        <td>{{ s.played }}</td>
                        <td>{{ s.won }}</td>
                        <td>{{ s.drawn }}</td>
                        <td>{{ s.lost }}</td>
                        <td>{{ s.goal }}</td>
                        <td>{{ s.difference }}</td>
                        <td>{{ s.points }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
export default {
    name: "Team",
    props: {
        season: [],
    }
};
</script>

<style scoped></style>
