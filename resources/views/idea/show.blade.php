<x-app-layout>

    <div>
        <a href="/" class="flex items-center font-semibold hover:underline">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="ml-2">All ideas</span>
        </a>
    </div>

    <!-- posebna tema -->

    <div class="idea-container bg-white rounded-xl flex mt-4">
        <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
            <div class="flex-none mx-2 md:mx-4">
                <a href="#">
                    <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="mx-2 md:mx-4 w-full">
                <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">{{ $idea -> title }}</a>
                </h4>
                <div class="text-gray-600 mt-3 line-clamp-3">
                    {{ $idea -> description }}
                </div>
                <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                    <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                        <div class="md:block hidden font-bold text-gray-900">{{ $idea -> user -> name }}</div>
                        <div class="md:block hidden">&bull;</div>
                        <div>{{ $idea -> created_at -> diffForHumans() }}</div>
                        <div>&bull;</div>
                        <div>{{ $idea->category->name }}</div>
                        <div>&bull;</div>
                        <div class="text-gray-900">3 Comments</div>
                    </div>
                    <div class="flex items-center space-x-2 mt-4 md:mt-0" x-data="{ isOpen: false }">
                        <div class="bg-gray-200 text-xxs fomt-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">Open</div>
                        <button class="bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-200 ease-in px-3 relative" @click="isOpen = !isOpen">
                            <svg fill="currentColor" width="24" height="6">
                                <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5);">
                            </svg>
                            <ul class="absolute w-44 font-semibold bg-white shadow-lg rounded-xl py-3 text-left md:ml-8 top-8 md:top-6 right-0 md:left-0 z-10" x-show="isOpen" x-transition.origion.top.left @click.away="isOpen=false" @keydown.escape.window="isOpen=false" style="display:none;"">
                                <li><a href=" #" class="hover:bg-gray-100 px-5 py-3 transition duration-200 ease-in block">Mark as spam</a></li>
                                <li><a href="#" class="hover:bg-gray-100 px-5 py-3 transition duration-200 ease-in block">Delete post</a></li>
                            </ul>
                        </button>
                    </div>
                    <div class="flex items-center md:hidden mt-4 md:mt-0">
                        <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                            <div class="text-sm font-bold leading-none">12</div>
                            <div class="text-xxs font-semibold leading-none text-gray-400">Votes</div>
                        </div>
                        <button class="w-20 text-xxs uppercase bg-gray-200 border border-gray-200 font-bold rounded-xl hover:border-gray-400 transition duration-200 ease-in px-4 py-3 -mx-5">
                            vote
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--  kraj containera  -->



    <!-- linija ispod teme -->

    <div class="buttons-container flex items-center justify-between mt-6">
        <div class="flex flex-col md:flex-row items-center space-x-4 md:ml-6">
            <div class="relative" x-data="{ isOpen: false }">
                <button type="button" @click="isOpen = !isOpen" class="flex items-center justify-center w-32 h-11 text-xs bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-200 ease-in px-6 py-3 text-white">
                    Reply
                </button>
                <div class="absolute z-10 w-64 md:w-104 text-left font-semibold text-sm bg-white shadow-md rounded-xl mt-2" x-show="isOpen" x-transition.origion.top.left @click.away="isOpen=false" @keydown.escape.window="isOpen=false" style="display:none;"">
                    <form action=" #" class="space-y-4 px-4 py-6">
                    <div>
                        <textarea name="post_comment" id="post_comment" cols="30" rows="4" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2" placeholder="Go ahead, dont be shy. Share your thoughts."></textarea>
                    </div>
                    <div class="flex flex-col md:flex-row items-center md:space-x-3">
                        <button type="button" class="flex items-center justify-center w-full md:w-1/2 h-11 text-xs bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-200 ease-in px-6 py-3 text-white">
                            Post comment
                        </button>
                        <button type="button" class="flex items-center justify-center w-full md:w-1/2 h-11 mt-2 md:mt-0 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-200 ease-in px-6 py-3">
                            <svg class="text-gray-600 w-5 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                            </svg>
                            <span class="ml-1">Attach</span>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="relative">
                <button type="button" class="flex items-center justify-center w-32 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-200 ease-in px-6 py-3 mt-2 md:mt-0">
                    <span>Set status</span>
                    <svg class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="absolute z-10 w-104 text-left font-semibold text-sm bg-white shadow-md rounded-xl w-96 mt-2 hidden">
                    <form action="#" class="space-y-4 px-4 py-6">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit iure optio ea eaque dolorum labore vero adipisci iusto quos accusantium!
                    </form>
                </div>
            </div>
        </div>
        <div class="hidden md:flex items-center space-x-3">
            <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug">12</div>
                <div class="text-gray-400 text-xs leading-none">Votes</div>
            </div>
            <button type="button" class="w-32 h-11 text-xs bg-gray-200 font-semibold uppercase rounded-xl border border-gray-200 hover:border-gray-400 transition duration-200 ease-in px-6 py-3">
                <span>Vote</span>
            </button>
        </div>
    </div> <!--  kraj containera  -->



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
                        <div class="flex items-center space-x-2" x-data="{ isOpen: false }">
                            <button class="bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-200 ease-in px-3 relative" @click="isOpen = !isOpen">
                                <svg fill="currentColor" width="24" height="6">
                                    <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5);">
                                </svg>
                                <ul class="absolute w-44 font-semibold bg-white shadow-lg rounded-xl py-3 text-left md:ml-8 top-8 md:top-6 right-0 md:left-0 z-10" x-show="isOpen" x-transition.origion.top.left @click.away="isOpen=false" @keydown.escape.window="isOpen=false" style="display:none;">
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