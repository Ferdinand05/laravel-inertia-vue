<template>
    <Layout title="Create User">
        <h3>Update User</h3>

        <form @submit.prevent="updateUser(page.props.user.id)" method="post">
            <label for="name">Name : </label><br />
            <input
                type="text"
                name="name"
                id="name"
                v-model="form.name"
                autocomplete="off"
                size="50"
            />
            <div class="error">
                {{ form.errors.name }}
            </div>
            <br />
            <label for="email">Email : </label><br />
            <input
                type="text"
                name="email"
                id="email"
                v-model="form.email"
                autocomplete="off"
                size="50"
            />
            <div class="error">
                {{ form.errors.email }}
            </div>
            <br />
            <button type="submit" :disabled="form.processing">Submit</button>
        </form>
        <br />
        <Link href="/user">Back</Link>
    </Layout>
</template>

<script setup>
import Layout from "../../Layouts/Layout.vue";
import { useForm } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";

const page = usePage();

const form = useForm({
    email: page.props.user.email,
    name: page.props.user.name,
    id: page.props.user.id,
});

function updateUser(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You will update this data!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Update !",
    })
        .then((result) => {
            if (result.isConfirmed) {
                form.put(`/user/${id}`, {
                    preserveScroll: true,
                    onSuccess: () => {
                        Swal.fire({
                            title: "Updated!",
                            text: "Your data has been updated.",
                            icon: "success",
                        });
                    },
                    onError: (errors) => {
                        console.log(errors);
                    },
                });
            }
        })
        .catch((e) => {
            console.log(e);
        });
}
</script>
