<template>
    <Layout title="Home" metaDesc="This is a Homepage">
        <div class="mt-14 mb-10">
            <h1 class="text-4xl">I am, {{ $page.props.auth.user.name }}</h1>
            <h3 class="text-lg text-gray-700">
                {{ $page.props.auth.user.email }}
            </h3>
            <div class="text-gray-400 text-sm">
                Joined at {{ $page.props.auth.user.created_at }}
            </div>

            <p class="mt-10 first-letter:text-2xl">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab
                quibusdam maxime consequatur assumenda id, laborum possimus qui
                magni dolorem illo in. Assumenda molestias dolorem atque velit
                rerum commodi cum cupiditate possimus iusto, illo enim ratione
                laborum, iste, ex a. Repudiandae dolorem corporis perspiciatis,
                quod debitis ab rerum! Officia, deserunt accusamus?
            </p>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "../Layouts/Layout.vue";
import { Head } from "@inertiajs/vue3";
defineProps({ profile: Object });
</script>
<style scoped></style>
