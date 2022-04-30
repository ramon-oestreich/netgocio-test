<template>
    <main>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users
        </h2>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <inertia-link href="/users"
                                  class="bg-black-900 text-black-50 px-3 py-2 rounded-md text-sm font-medium">Users
                    </inertia-link>
                </div>
            </div>
        </nav>
        <article>
            <slot/>
        </article>
    </main>
</template>

<script>
export default {
    name: "Layout",
    // inject:['page']
}
</script>

<style scoped>

</style>
