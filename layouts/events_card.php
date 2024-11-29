<?php 

$events = [
   [
      "date" => "20 November 2024",
      "author" => "BY JOHN DOE",
      "title" => "A Guide to Igniting Your Imagination",
      "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula."
   ],
   [
      "date" => "21 November 2024",
      "author" => "BY JOHN DOE",
      "title" => "A Guide to Igniting Your Imagination",
      "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula."
   ],
   [
      "date" => "23 November 2024",
      "author" => "BY JOHN DOE",
      "title" => "A Guide to Igniting Your Imagination",
      "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula."
   ],
   [
      "date" => "25 November 2024",
      "author" => "BY JOHN DOE",
      "title" => "A Guide to Igniting Your Imagination",
      "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula."
   ],
];


foreach($events as $data) {
   echo
      "<div class='bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] relative top-0 hover:-top-2 transition-all duration-300'>" .
         "<img src='https://readymadeui.com/Imagination.webp' alt='Blog Post 1' class='w-full h-60 object-cover' />" .
         "<div class='p-6'>" .
            "<span class='text-sm block text-gray-400 mb-2'>" . $data['date'] . "</span>" .
            "<h3 class='text-xl font-bold text-gray-800'>" . $data['title'] . "</h3>" .
            "<hr class='my-4' />" .
            "<p class='text-gray-400 text-sm line-clamp-4'>" . $data['content'] . "</p>" .
         "</div>" .
      "</div>";
}


?>