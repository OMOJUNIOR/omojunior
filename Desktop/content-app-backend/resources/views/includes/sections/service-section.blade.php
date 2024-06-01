<!-- Start block -->
<section class="py-4 bg-gray-300 dark:bg-dark-900">
    <div class="" x-data="{ activeTab: 'tab-1' }">
        <div class="container px-2 mx-auto">
            <div class="text-center">
                <h2 class="mb-4 text-2xl font-bold">Professional Translation, Interpretation, Consultant services and AI
                    Education</h2>
                <p class="mb-8 text-gray-700">Lorem ipsum dolor sit, amet consectetur adipisicing elit... <br> Lorem
                    ipsum dolor sit amet, consectetur adipisicing elit. Consectetur deleniti vero, possimus ratione
                    suscipit impedit dolorum facere. Et quasi molestiae harum officiis, distinctio atque aperiam fugit,
                    dolorem alias eius laboriosam.</p>
            </div>
            <div class="flex flex-wrap justify-center px-2 mb-6 sm:px-0">
                <ul class="flex flex-wrap justify-center space-x-0 text-xl font-bold sm:space-x-4">
                    <template
                        x-for="(tab, index) in ['Language Learning', 'Language Translation', 'Language Interpretation', 'Content Writing', 'AI Education', ' Research Consultancy']"
                        :key="index">
                        <li class="mb-2 sm:mb-0">
                            <button
                                class="px-2 font-semibold text-gray-900 hover:text-blue-500 focus:outline-none sm:px-0"
                                :class="{ 'text-blue-500': activeTab === 'tab-' + (index +
                                    1), 'bg-gray-300': activeTab === 'tab-' + (index + 1) }"
                                @click="activeTab = 'tab-' + (index + 1)">
                                <span x-text="tab"></span>
                            </button>
                        </li>
                    </template>
                </ul>
            </div>
            <div class="flex justify-center">
                <div class="w-full p-5 bg-gray-200 rounded-lg md:w-3/4 lg:w-1/2">
                    <template x-for="(tab, index) in ['tab-1', 'tab-2', 'tab-3', 'tab-4', 'tab-5', 'tab-6']"
                        :key="index">
                        <div x-show="activeTab === tab" class="flex justify-center"
                            :class="{ 'active': activeTab === tab }">
                            <div class="w-full">
                                <div class="p-4 bg-gray-200 rounded-lg">
                                    <p class="font-semibold">Content examples:</p>
                                    <ul class="list-disc list-inside style-none">
                                        <li x-show="activeTab === 'tab-1'">
                                            Unlock the potential of language with our comprehensive language learning
                                            services. At
                                            <strong>Kwaatɔnɔma</strong>, we collaborate with the School of Continuing
                                            Studies (SCS) for the language courses. At SCS, our
                                            experienced language educators provide personalized instruction tailored to
                                            your learning style and goals.
                                            Whether you are a beginner or looking to advance your fluency, our flexible,
                                            interactive, and immersive courses
                                            in over 10 languages will enhance your linguistic abilities and cultural
                                            understanding of Liberian and African
                                            languages.
                                        </li>
                                        <li x-show="activeTab === 'tab-2'">At <strong>Kwaatɔnɔma</strong>, we provide
                                            professional translation services to help bridge language
                                            barriers and connect cultures. Our team of expert translators handles
                                            documents, websites, software, and
                                            multimedia content across more than 16 languages, ensuring your message is
                                            conveyed accurately and
                                            effectively. </li>
                                        <li x-show="activeTab === 'tab-3'">Effective communication is vital in our
                                            globalized world. Our language interpretation
                                            services facilitate real-time understanding in meetings, conferences,
                                            seminars, and other scenarios where
                                            direct communication is essential. We provide both simultaneous and
                                            consecutive interpretations, specialized
                                            for your specific needs. </li>
                                        <li x-show="activeTab === 'tab-4'">Capture and engage your audience with
                                            compelling content crafted by our professional
                                            writers. At Kwaatɔnɔma, we specialize in creating SEO-optimized content that
                                            enhances visibility and engages
                                            readers. Our services include blogs, articles, web content, press releases,
                                            and marketing materials, each
                                            written to amplify your brand's voice.
                                        </li>
                                        <li x-show="activeTab === 'tab-5'">Navigate the complexities of artificial
                                            intelligence with our expert consultancy services. We
                                            specialize in developing and integrating AI solutions to transform your
                                            operational efficiency and
                                            competitiveness. Our services include machine learning, natural language
                                            processing, Prompt Engineering, and
                                            predictive analytics, providing tailored AI strategies that align with your
                                            business objectives.
                                        </li>
                                        <li x-show="activeTab === 'tab-6'">Research Our research services offer deep
                                            insights and comprehensive analyses to support your business
                                            decisions, academic pursuits, or development projects. We utilize
                                            cutting-edge methodologies and data
                                            driven approaches to provide market research, user experience research,
                                            competitive analysis, and
                                            educational studies. </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</section>
