<template>
    <Layout title="Home | Ferdinand">
        <div>
            <h1>Hello World!</h1>
            <h3>
                Hello, My name is {{ profile.name }}, i am
                {{ profile.age }} years old. i came from {{ profile.country }}
            </h3>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "../Layouts/Layout.vue";

defineProps({ profile: Object });
</script>
<style scoped></style>
