<template>
    <nav class="my-auto">
        <ul class="flex space-x-6">
            <li>
                <NavLink href="/" :active="$page.component === 'Home'">
                    Home
                </NavLink>
            </li>
            <li>
                <NavLink href="/users" :active="$page.component === 'Users'">
                    Users
                </NavLink>
            </li>
            <li>
                <NavLink
                    href="/settings"
                    :active="$page.component === 'Settings'"
                >
                    Settings
                </NavLink>
            </li>
            <li>
                <NavLink href="/logout" method="POST" as="button"
                    >Logout</NavLink
                >
            </li>
        </ul>
    </nav>
</template>

<script>
import NavLink from "./NavLinks.vue";
import { Link } from "@inertiajs/vue3";
export default {
    components: {
        NavLink,
        Link,
    },
};
</script>
