<template>
    <div>
        <Layout title="Create User">
            <h3>Form Create User</h3>

            <form @submit.prevent="createUser()" method="post">
                <label for="name">name : </label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    v-model="form.name"
                    autocomplete="off"
                />
                <div class="error">
                    {{ form.errors.name }}
                </div>
                <br />
                <label for="email">email : </label>
                <input
                    type="text"
                    name="email"
                    id="email"
                    v-model="form.email"
                    autocomplete="off"
                />
                <div class="error">
                    {{ form.errors.email }}
                </div>
                <br />
                <label for="password">password : </label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    v-model="form.password"
                    autocomplete="off"
                />
                <div class="error">
                    {{ form.errors.password }}
                </div>
                <br />
                <button type="submit" :disabled="form.processing">
                    Submit
                </button>
            </form>
        </Layout>
    </div>
</template>

<script setup>
import Layout from "../../Layouts/Layout.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    email: null,
    password: null,
    name: null,
});

function createUser() {
    form.post("/user", form, {
        preserveScroll: true,
        onSuccess: () => form.reset("name"),
    });
}
</script>

<style scoped>
.error {
    color: red;
}
</style>
