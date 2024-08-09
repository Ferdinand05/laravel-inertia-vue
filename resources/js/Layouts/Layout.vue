<template>
    <div>
        <header>
            <Navbar></Navbar>
            <Head>
                <title>{{ title }}</title>
                <meta name="description" :content="metaDesc" />
            </Head>
        </header>

        <main>
            <slot></slot>
        </main>

        <footer>
            <div class="footer">All Rights Reserved. Ferdinand &copy;2024</div>
        </footer>
    </div>
</template>

<script setup>
import { watch, ref } from "vue";
import Navbar from "../Components/Navbar.vue";
import { Head } from "@inertiajs/vue3";
defineProps({ title: String, metaDesc: String });
</script>

<style scoped>
.footer {
    text-align: center;
    color: gray;
    padding: 10px;
    background-color: #eee;
}

main {
    padding-left: 30px;
    padding-right: 25px;
}
</style>
