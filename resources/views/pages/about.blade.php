<x-app-layout title="About Patrick van 't Wout" description="This is the page where you find more information about Patrick van 't Wout" fixed="true">
    <section class="relative min-h-dvh flex items-center justify-center">
        <x-container>
            <h1 class="text-3xl md:text-5xl text-primary text-center font-bold dark:text-white">Patrick van 't Wout</h1>
            <h2 class="text-lg md:text-xl text-gray-600 text-center font-bold mt-2 dark:text-gray-400">Software developer</h2>
        </x-container>
        <div class="absolute bottom-2 w-full flex justify-center">
            <a href="#my-story" class="block text-gray-600 hover:text-gray-900 dark:text-gray-400 hover:dark:text-gray-100 p-4 transition duration-200 outline-none focus-visible:ring focus-visible:ring-blue-500">
                <span class="sr-only">Go to my story</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 motion-safe:animate-bounce" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
                </svg>                              
            </a>
        </div>
    </section>
    <section id="my-story">
        <div class="bg-gradient-to-b from-sky-500 to-sky-700 px-4 py-8 md:py-16">
            <h2 class="text-3xl md:text-5xl text-white font-bold text-center">My story</h2>
        </div>
        <x-container>
            <p>
                As you already know, my name is Patrick van 't Wout. I often abbreviate my name as 'Pvtw' on the web.
                First I would like to tell you my development story.
            </p>
            <h3 class="mt-4 text-xl font-bold">Where it began...</h3>
            <p class="mt-2">
                My first ever development project was a small website from the browser game Neopets.
                Every character has a page which you can customize; Basically only HTML but with a small trick allows CSS aswell.
                Very quickly I learned how to create a simple webpage.
                <strong>BUT</strong> It doesn't stop there. I wanted to learn more about web development.
                So I searched the internet on how to make better websites and another language came across my attention.
                The wonderful world of PHP. I always say I learned PHP when PHP and MySQL had the same version number; version 5.4.
                I created a forum from scratch for a RuneScape clan I was in. I became a PHP master.
            </p>
            <h3 class="mt-4 text-xl font-bold">And now...</h3>
            <p class="mt-2">
                Currently I am taking a software development course. During the course I learn how to work in a scrum team with agile.
                Also a few programming languages like JavaScript and C#. Creating projects with colleagues to learn from and to keep us busy.
                Altho side-projects, like this website, are a better way to learn and more fun. Especially in the fast moving world of web development.
            </p>
            <h3 class="mt-4 text-xl font-bold">The future</h3>
            <p class="mt-2">
                I see myself working at a company building amazing websites or applications.
                Learning everyday and be helpful to eachother. New technologies that help us moving forward.
                Also that little error you get. Struggling to get it working and your colleague fixed it in 5 minutes...
                Yes, it happends. And I want to be there!
            </p>
        </x-container>
    </section>
    <section id="skills" class="mt-8">
        <div class="bg-gradient-to-b from-lime-500 to-lime-700 px-4 py-8 md:py-16">
            <h2 class="text-3xl md:text-5xl text-white font-bold text-center">Skills</h2>
        </div>
        <x-container class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <div>
                <h3 class="text-xl text-black dark:text-white font-bold">Programming languages</h3>
                <ul class="grid gap-4 mt-4">
                    <li>
                        <span class="text-lg">PHP</span>
                        <div class="border border-gray-600 dark:border-gray-400">
                            <div class="w-[98%] h-4 bg-gradient-to-b from-lime-500 to-lime-700">
                                <span class="sr-only">98%</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <span class="text-lg">C#</span>
                        <div class="border border-gray-600 dark:border-gray-400">
                            <div class="w-[95%] h-4 bg-gradient-to-b from-lime-500 to-lime-700">
                                <span class="sr-only">95%</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <span class="text-lg">TypeScript</span>
                        <div class="border border-gray-600 dark:border-gray-400">
                            <div class="w-[90%] h-4 bg-gradient-to-b from-lime-500 to-lime-700">
                                <span class="sr-only">90%</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <span class="text-lg">SQL</span>
                        <div class="border border-gray-600 dark:border-gray-400">
                            <div class="w-[90%] h-4 bg-gradient-to-b from-lime-500 to-lime-700">
                                <span class="sr-only">90%</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="mt-4 md:mt-0">
                <h3 class="text-xl text-black dark:text-white font-bold">Tools and frameworks</h3>
                <ul class="grid gap-4 mt-4">
                    <li>
                        <span class="text-lg">Laravel</span>
                        <div class="border border-gray-600 dark:border-gray-400">
                            <div class="w-[95%] h-4 bg-gradient-to-b from-lime-500 to-lime-700">
                                <span class="sr-only">95%</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <span class="text-lg">.NET</span>
                        <div class="border border-gray-600 dark:border-gray-400">
                            <div class="w-[95%] h-4 bg-gradient-to-b from-lime-500 to-lime-700">
                                <span class="sr-only">95%</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <span class="text-lg">Angular</span>
                        <div class="border border-gray-600 dark:border-gray-400">
                            <div class="w-[90%] h-4 bg-gradient-to-b from-lime-500 to-lime-700">
                                <span class="sr-only">90%</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <span class="text-lg">Tailwind CSS</span>
                        <div class="border border-gray-600 dark:border-gray-400">
                            <div class="w-[90%] h-4 bg-gradient-to-b from-lime-500 to-lime-700">
                                <span class="sr-only">90%</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="md:col-span-2 mt-4">
                <p>My skills are not limited to the languages and frameworks mentioned above. I do find those the most important to know.</p>
            </div>
        </x-container>
    </section>
    <section id="meet-the-bird" class="mt-8">
        <div class="bg-gradient-to-b from-orange-500 to-orange-700 px-4 py-8 md:py-16">
            <h2 class="text-3xl md:text-5xl text-white font-bold text-center">Meet the bird</h2>
        </div>
        <x-container>
            <div class="bg-white max-w-sm flex flex-col items-center justify-center mt-8 mx-auto p-4 rounded-lg shadow-lg dark:bg-gray-800">
                <img src="/images/cockatiel.png" class="w-64 h-64 rounded-full border-4 border-orange-600 shadow-lg" alt="Cockatiel" loading="lazy">
                <p class="mt-4 text-center">
                    This is my little cockatiel. His name is Kuifie (small crest).
                    He is a oldie, almost 12 years old. He still likes to fly around and play.
                    If you are lucky, he will say 'hi' back. Or atleast trying to.
                </p>
            </div>
        </x-container>
    </section>
</x-app-layout>