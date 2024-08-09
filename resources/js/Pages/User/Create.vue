<template>
    <Layout title="Create User">
        <div class="mt-5 mb-10">
            <h3 class="text-4xl my-3">Form Create User</h3>

            <form
                preserve-scroll
                @submit.prevent="createUser()"
                method="post"
                enctype="multipart/form-data"
            >
                <InputComponent
                    label="Name :"
                    v-model="form.name"
                    name="name"
                    :error="form.errors.name"
                ></InputComponent>
                <br />
                <InputComponent
                    label="Email : "
                    v-model="form.email"
                    name="email"
                    :error="form.errors.email"
                    type="email"
                ></InputComponent>
                <br />
                <InputComponent
                    label="Password : "
                    v-model="form.password"
                    name="password"
                    :error="form.errors.password"
                    type="password"
                ></InputComponent>
                <br />
                <InputComponent
                    label="Password Confirmation :"
                    v-model="form.password_confirmation"
                    name="name"
                    type="password"
                ></InputComponent>

                <br />
                <label for="avatar" class="">Avatar : </label><br />
                <input
                    type="file"
                    class="file:bg-blue-400 file:rounded-md file:border-none file:px-2 file:py-1 file:cursor-pointer"
                    name="avatar"
                    id="avatar"
                    @change="form.avatar = $event.target.files[0]"
                />

                <div class="error">
                    {{ form.errors.avatar }}
                </div>
                <br />
                <progress
                    class="rounded-xl bg-yellow-300"
                    v-if="form.progress"
                    :value="form.progress.percentage"
                    max="100"
                >
                    {{ form.progress.percentage }}%
                </progress>
                <br />
                <button
                    type="submit"
                    class="bg-green-500 px-3 py-1 rounded-md"
                    :disabled="form.processing"
                    preserve-scroll
                >
                    Submit
                </button>
            </form>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "../../Layouts/Layout.vue";
import { useForm } from "@inertiajs/vue3";
import InputComponent from "../../Components/InputComponent.vue";
const form = useForm({
    email: null,
    password: null,
    name: null,
    avatar: null,
    password_confirmation: null,
});

function createUser() {
    form.post(route("user.store"), {
        forceFormData: true,
        preserveScroll: true,
        onSuccess: () => {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Your work has been saved",
                showConfirmButton: false,
                timer: 1500,
            });
        },
        onError: () => {
            form.reset("password", "password_confirmation");
        },
    });
}
</script>

<style scoped></style>
