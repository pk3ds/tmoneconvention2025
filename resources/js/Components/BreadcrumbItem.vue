<template>
    <li class="flex">
        <div class="flex items-center">
            <svg
                class="flex-shrink-0 w-6 h-full text-gray-200"
                viewBox="0 0 24 44"
                preserveAspectRatio="none"
                fill="currentColor"
                aria-hidden="true"
            >
                <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
            </svg>
            <slot />
        </div>
    </li>
</template>
