<x-app-layout>

    <div>
        <a href="/voting/public/" class="flex items-center font-semibold hover:underline">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="ml-2">All ideas</span>
        </a>
    </div>


    <livewire:idea-show :idea="$idea" :votes="$votes" />


    <!-- sektor komentara -->

    <div class="comments-container relative spance-y-6 md:ml-24 my-8 mt-1 pt-4">
        <div class="comment-container bg-white rounded-xl flex mt-4 relative">
            <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                <div class="flex-none mx-4">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&w=8170" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="md:mx-4 w-full">
                    <!-- <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4> -->
                    <div class="text-gray-600 mt-3">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum, accusamus. Pariatur incidunt, eos fugiat inventore quas esse corporis laboriosam assumenda voluptatibus deleniti vitae asperiores numquam consequatur ab beatae, impedit sunt accusantium. Repudiandae, nam velit architecto ipsa est sequi iusto ab in, aliquam voluptatum nulla. Asperiores qui nostrum fugiat, expedita, voluptas aliquid, inventore maxime doloremque aspernatur sit sed autem consequuntur quae. Ipsum, sint iure doloremque minus praesentium id commodi cupiditate quo repellat assumenda pariatur corrupti culpa eligendi laboriosam laborum ex nemo blanditiis vero! Libero neque, quam mollitia quisquam eius sequi velit quis dolorum repellendus unde magnam eaque obcaecati officiis amet nulla!
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div class="font-bold text-gray-900">John DOe</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>
                        <div class="flex items-center space-x-2" x-data="{ open: false }">
                            <button class="bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-200 ease-in px-3 relative" @click="open = !open">
                                <svg fill="currentColor" width="24" height="6">
                                    <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5);">
                                </svg>
                                <ul class="absolute w-44 font-semibold bg-white shadow-lg rounded-xl py-3 text-left md:ml-8 top-8 md:top-6 right-0 md:left-0 z-10" x-show="open" x-transition.origion.top.left @click.away="open=false" @keydown.escape.window="open=false" style="display:none;">
                                    <li><a href="#" class="hover:bg-gray-100 px-5 py-3 transition duration-200 ease-in block">Mark as spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 px-5 py-3 transition duration-200 ease-in block">Delete post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!--  kraj kartice komentara korisnika -->

        <div class="admin comment-container bg-white rounded-xl flex mt-4 relative">
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&w=8170" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                    <div class="text-center uppercase text-blue text-xxs font-bold mt-1">Admin</div>
                </div>
                <div class="mx-4 w-full">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">Status change are under construction</a>
                    </h4>
                    <div class="text-gray-600 mt-3">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum, accusamus. Pariatur incidunt, eos fugiat inventore quas esse corporis laboriosam assumenda voluptatibus deleniti vitae asperiores numquam consequatur ab beatae, impedit sunt accusantium. Repudiandae, nam velit architecto ipsa est sequi iusto ab in, aliquam voluptatum nulla. Asperiores qui nostrum fugiat, expedita, voluptas aliquid, inventore maxime doloremque aspernatur sit sed autem consequuntur quae. Ipsum, sint iure doloremque minus praesentium id commodi cupiditate quo repellat assumenda pariatur corrupti culpa eligendi laboriosam laborum ex nemo blanditiis vero! Libero neque, quam mollitia quisquam eius sequi velit quis dolorum repellendus unde magnam eaque obcaecati officiis amet nulla!
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div class="font-bold text-blue">Andrea</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-200 ease-in px-3 relative">
                                <svg fill="currentColor" width="24" height="6">
                                    <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5);">
                                </svg>
                                <ul class="absolute w-44 font-semibold bg-white shadow-lg rounded-xl py-3 text-left hidden">
                                    <li><a href="#" class="hover:bg-gray-100 px-5 py-3 transition duration-200 ease-in block">Mark as spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 px-5 py-3 transition duration-200 ease-in block">Delete post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!--  kraj kartice komentara admina -->

        <div class="comment-container bg-white rounded-xl flex mt-4 relative">
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&w=8170" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="mx-4 w-full">
                    <!-- <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4> -->
                    <div class="text-gray-600 mt-3">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum, accusamus. Pariatur incidunt, eos fugiat inventore quas esse corporis laboriosam assumenda voluptatibus deleniti vitae asperiores numquam consequatur ab beatae, impedit sunt accusantium. Repudiandae, nam velit architecto ipsa est sequi iusto ab in, aliquam voluptatum nulla. Asperiores qui nostrum fugiat, expedita, voluptas aliquid, inventore maxime doloremque aspernatur sit sed autem consequuntur quae. Ipsum, sint iure doloremque minus praesentium id commodi cupiditate quo repellat assumenda pariatur corrupti culpa eligendi laboriosam laborum ex nemo blanditiis vero! Libero neque, quam mollitia quisquam eius sequi velit quis dolorum repellendus unde magnam eaque obcaecati officiis amet nulla!
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div class="font-bold text-gray-900">John DOe</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-200 ease-in px-3 relative">
                                <svg fill="currentColor" width="24" height="6">
                                    <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5);">
                                </svg>
                                <ul class="absolute w-44 font-semibold bg-white shadow-lg rounded-xl py-3 text-left hidden">
                                    <li><a href="#" class="hover:bg-gray-100 px-5 py-3 transition duration-200 ease-in block">Mark as spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 px-5 py-3 transition duration-200 ease-in block">Delete post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!--  kraj kartice komentara korisnika -->
    </div> <!--  kraj containera  -->


</x-app-layout>