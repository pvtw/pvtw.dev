<x-app-layout title="Patrick van 't Wout" description="Hi there! My name is Patrick van 't Wout and this is my mystical world of code and hacking." fixed="true">
    <section class="bg-gradient-to-b from-fuchsia-500 from-60% to-gray-100 dark:to-gray-900 via-green-500 min-h-dvh flex justify-center items-center">
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
                        <a href="mailto:patrick@pvtw.dev" class="w-8 h-8 block outline-none focus-visible:ring focus-visible:ring-blue-500">
                            <span class="sr-only">Email</span>
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M3 8L10.8906 13.2604C11.5624 13.7083 12.4376 13.7083 13.1094 13.2604L21 8M5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19Z"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="currentColor"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/pvtw" class="w-8 h-8 block outline-none focus-visible:ring focus-visible:ring-blue-500">
                            <span class="sr-only">GitHub</span>
                            <svg enable-background="new 0 0 24 24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="m12 .5c-6.63 0-12 5.28-12 11.792 0 5.211 3.438 9.63 8.205 11.188.6.111.82-.254.82-.567 0-.28-.01-1.022-.015-2.005-3.338.711-4.042-1.582-4.042-1.582-.546-1.361-1.335-1.725-1.335-1.725-1.087-.731.084-.716.084-.716 1.205.082 1.838 1.215 1.838 1.215 1.07 1.803 2.809 1.282 3.495.981.108-.763.417-1.282.76-1.577-2.665-.295-5.466-1.309-5.466-5.827 0-1.287.465-2.339 1.235-3.164-.135-.298-.54-1.497.105-3.121 0 0 1.005-.316 3.3 1.209.96-.262 1.98-.392 3-.398 1.02.006 2.04.136 3 .398 2.28-1.525 3.285-1.209 3.285-1.209.645 1.624.24 2.823.12 3.121.765.825 1.23 1.877 1.23 3.164 0 4.53-2.805 5.527-5.475 5.817.42.354.81 1.077.81 2.182 0 1.578-.015 2.846-.015 3.229 0 .309.21.678.825.56 4.801-1.548 8.236-5.97 8.236-11.173 0-6.512-5.373-11.792-12-11.792z"
                                    fill="currentColor"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://linkedin.com/in/pvtw" class="w-8 h-8 block outline-none focus-visible:ring focus-visible:ring-blue-500">
                            <span class="sr-only">LinkedIn</span>
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current" aria-hidden="true">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://x.com/PvtwDev" class="w-8 h-8 block outline-none focus-visible:ring focus-visible:ring-blue-500">
                            <span class="sr-only">X</span>
                            <svg viewBox="0 0 1200 1227" xmlns="http://www.w3.org/2000/svg" class="fill-current" aria-hidden="true">
                                <path d="M714.163 519.284L1160.89 0H1055.03L667.137 450.887L357.328 0H0L468.492 681.821L0 1226.37H105.866L515.491 750.218L842.672 1226.37H1200L714.137 519.284H714.163ZM569.165 687.828L521.697 619.934L144.011 79.6944H306.615L611.412 515.685L658.88 583.579L1055.08 1150.3H892.476L569.165 687.854V687.828Z"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://youtube.com/@pvtw" class="flex items-center w-8 h-8 block outline-none focus-visible:ring focus-visible:ring-blue-500">
                            <span class="sr-only">YouTube</span>
                            <svg viewBox="0 0 29 20" xmlns="http://www.w3.org/2000/svg" class="fill-current" aria-hidden="true">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M27.4896 1.52422C27.9301 1.96749 28.2463 2.51866 28.4068 3.12258C29.0004 5.35161 29.0004 10 29.0004 10C29.0004 10 29.0004 14.6484 28.4068 16.8774C28.2463 17.4813 27.9301 18.0325 27.4896 18.4758C27.0492 18.9191 26.5 19.2389 25.8972 19.4032C23.6778 20 14.8068 20 14.8068 20C14.8068 20 5.93586 20 3.71651 19.4032C3.11363 19.2389 2.56449 18.9191 2.12405 18.4758C1.68361 18.0325 1.36732 17.4813 1.20683 16.8774C0.613281 14.6484 0.613281 10 0.613281 10C0.613281 10 0.613281 5.35161 1.20683 3.12258C1.36732 2.51866 1.68361 1.96749 2.12405 1.52422C2.56449 1.08095 3.11363 0.76113 3.71651 0.596774C5.93586 0 14.8068 0 14.8068 0C14.8068 0 23.6778 0 25.8972 0.596774C26.5 0.76113 27.0492 1.08095 27.4896 1.52422ZM19.3229 10L11.9036 5.77905V14.221L19.3229 10Z"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
          </div>
        </div>
    </section>
</x-app-layout>