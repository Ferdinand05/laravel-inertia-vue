<template>
    <Layout :title="user.name">
        <div>
            <h2>Profile User</h2>
            <div>
                <ul>
                    <li>{{ user.name }}</li>
                    <li>{{ user.email }}</li>
                    <li>
                        {{
                            Intl.DateTimeFormat("id-ID", {
                                year: "numeric",
                                month: "short",
                                day: "2-digit",
                            }).format(new Date(user.created_at))
                        }}
                    </li>
                </ul>
            </div>

            <Link as="button" :href="route('user.index')">Back</Link>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "../../Layouts/Layout.vue";
defineProps({ user: Object });
</script>
