<template>
    <nav class="p-5 bg-green-400 flex justify-between">
        <ul class="flex gap-x-10 ms-5">
            <li class="hover:text-white transition-all duration-100">
                <Link :href="route('pages.index')">Home</Link>
            </li>
            <li class="hover:text-white transition-all duration-100">
                <Link :href="route('pages.about')">About</Link>
            </li>
            <li class="hover:text-white transition-all duration-100">
                <Link :href="route('user.index')">User</Link>
            </li>
        </ul>
        <ul>
            <li
                class="transition-all duration-100 bg-white px-3 py-1 rounded-md"
            >
                <Link :href="route('login')">Login</Link>
            </li>
        </ul>
    </nav>
</template>

<script setup></script>

<style scoped></style>
