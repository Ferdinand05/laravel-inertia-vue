<template>
    <nav>
        <ul>
            <li>
                <Link :href="route('pages.index')">Home</Link>
            </li>
            <li>
                <Link :href="route('pages.about')">About</Link>
            </li>
            <li>
                <Link :href="route('user.index')">User</Link>
            </li>
        </ul>
    </nav>
</template>

<script setup></script>

<style scoped>
nav ul {
    display: flex;
}
nav ul li {
    list-style-type: none;
    margin-right: 20px;
}

nav ul li a {
    text-decoration: none;
}
</style>
