<x-app-layout fixed="true">
    <section class="bg-gradient-to-b from-fuchsia-500 from-60% to-gray-100 dark:to-gray-900 via-green-500 min-h-screen flex justify-center items-center">
        <div class="flex flex-col-reverse md:flex-row justify-center items-center md:space-x-8 p-4 mt-16 md:mt-0">
            <div class="max-w-[24rem] max-h-[24rem] w-full opacity-50 rounded-full overflow-hidden mt-4 md:mt-0">
                <img src="/images/owl.png" alt="Owl" loading="lazy">
            </div>
            <div class="bg-gray-800 bg-opacity-50 p-8 max-w-2xl rounded-xl shadow-2xl text-gray-100">
                <h1 class="font-bold md:text-3xl text-xl font-mono uppercase">Hi there!</h1>
                <p class="mt-4 md:text-lg">
                    My name is Patrick van 't Wout. A software developer living in the Netherlands.
                    I have a passion for mathematics (basically anything with numbers), hacking and owls...
                    You can't deny. They are beautiful animals, aren't they?
                </p>
                <p class="mt-4 md:text-lg">
                    I like to code in C#, TypeScript and PHP.
                    The latter more for personal projects, like the website you're looking at right now!
                    Currently, I am on my internship at SnelStart B.V. to finish off my course.
                </p>

                <hr class="mt-4 border-2 border-gray-400">

                <ul class="flex space-x-2 mt-4">
                    <li>
                        <a href="mailto:patrick@pvtw.dev" class="w-8 h-8 block">
                            <span class="sr-only">Email</span>
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M3 8L10.8906 13.2604C11.5624 13.7083 12.4376 13.7083 13.1094 13.2604L21 8M5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19Z"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="currentColor"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/pvtw" class="w-8 h-8 block">
                            <span class="sr-only">GitHub</span>
                            <svg enable-background="new 0 0 24 24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="m12 .5c-6.63 0-12 5.28-12 11.792 0 5.211 3.438 9.63 8.205 11.188.6.111.82-.254.82-.567 0-.28-.01-1.022-.015-2.005-3.338.711-4.042-1.582-4.042-1.582-.546-1.361-1.335-1.725-1.335-1.725-1.087-.731.084-.716.084-.716 1.205.082 1.838 1.215 1.838 1.215 1.07 1.803 2.809 1.282 3.495.981.108-.763.417-1.282.76-1.577-2.665-.295-5.466-1.309-5.466-5.827 0-1.287.465-2.339 1.235-3.164-.135-.298-.54-1.497.105-3.121 0 0 1.005-.316 3.3 1.209.96-.262 1.98-.392 3-.398 1.02.006 2.04.136 3 .398 2.28-1.525 3.285-1.209 3.285-1.209.645 1.624.24 2.823.12 3.121.765.825 1.23 1.877 1.23 3.164 0 4.53-2.805 5.527-5.475 5.817.42.354.81 1.077.81 2.182 0 1.578-.015 2.846-.015 3.229 0 .309.21.678.825.56 4.801-1.548 8.236-5.97 8.236-11.173 0-6.512-5.373-11.792-12-11.792z"
                                    fill="currentColor"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://linkedin.com/in/pvtw" class="w-8 h-8 block">
                            <span class="sr-only">LinkedIn</span>
                            <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" class="fill-current" aria-hidden="true">
                                <path d="m256 0c-141.363281 0-256 114.636719-256 256s114.636719 256 256 256 256-114.636719 256-256-114.636719-256-256-256zm-74.390625 387h-62.347656v-187.574219h62.347656zm-31.171875-213.1875h-.40625c-20.921875 0-34.453125-14.402344-34.453125-32.402344 0-18.40625 13.945313-32.410156 35.273437-32.410156 21.328126 0 34.453126 14.003906 34.859376 32.410156 0 18-13.53125 32.402344-35.273438 32.402344zm255.984375 213.1875h-62.339844v-100.347656c0-25.21875-9.027343-42.417969-31.585937-42.417969-17.222656 0-27.480469 11.601563-31.988282 22.800781-1.648437 4.007813-2.050781 9.609375-2.050781 15.214844v104.75h-62.34375s.816407-169.976562 0-187.574219h62.34375v26.558594c8.285157-12.78125 23.109375-30.960937 56.1875-30.960937 41.019531 0 71.777344 26.808593 71.777344 84.421874zm0 0">
                                </path>
                            </svg>
                        </a>
                    </li>
                </ul>
          </div>
        </div>
    </section>
</x-app-layout>