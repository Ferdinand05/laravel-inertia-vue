<template>
    <Head title="Login" metaDesc="Login"></Head>
    <div>
        <div class="border p-5 m-auto w-1/3 mt-24 rounded shadow-md">
            <div class="p-2 border mb-3 rounded bg-green-300">
                <h3 class="text-xl text-center">
                    Start your journey from here.
                </h3>
            </div>
            <div class="border p-3 rounded">
                <form @submit.prevent="login()" method="post">
                    <InputComponent
                        name="email"
                        :error="form.errors.email"
                        type="email"
                        label="Email : "
                        v-model="form.email"
                    ></InputComponent>
                    <InputComponent
                        name="password"
                        :error="form.errors.password"
                        type="password"
                        label="Password : "
                        v-model="form.password"
                    ></InputComponent>

                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            name="remember_me"
                            id="remember_me"
                            v-model="form.remember"
                        />&nbsp;
                        <label for="remember_me">Remember Me</label>
                    </div>

                    <div class="p-3 text-center">
                        <button
                            type="submit"
                            class="bg-green-400 px-4 py-1 rounded-md hover:bg-green-500"
                            :disabled="form.processing"
                        >
                            Login
                        </button>
                    </div>
                    <div class="text-center">
                        <Link href="#" class="text-blue-700 hover:text-blue-500"
                            >Already have an account ?</Link
                        >
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm, Head } from "@inertiajs/vue3";
import Layout from "../../Layouts/Layout.vue";
import InputComponent from "../../Components/InputComponent.vue";

const form = useForm({
    email: null,
    password: null,
    remember: null,
});
function login() {
    form.post(route("login"), {
        preserveScroll: true,
        onError: () => {
            form.reset("email", "password");
        },
    });
}
</script>
