document.getElementById('menu-toggle').addEventListener('click', function () {
    const nav = document.getElementById('nav-links');
     nav.classList.toggle('hidden');


    // Toggle hamburger icon to "X"
    const icon = document.getElementById('menu-icon');
    if (nav.classList.contains('hidden')) {
      icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />';
    } else {
      icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />';
    }
  });
  
  // For carousel loading on homepage
  document.addEventListener('DOMContentLoaded', () => {
    const track = document.getElementById('carousel-track');
    const slides = track.children;
    const interval = 3000;
    let index = 0;
  
    const scroll = () => {
      const slideWidth = slides[0].offsetWidth + 20; // 20 for space-x-5
      const maxIndex = slides.length - 3; // Show 3 slides at a time
  
      index = (index >= maxIndex) ? 0 : index + 1;
      track.style.transform = `translateX(-${index * slideWidth}px)`;
    };
  
    setInterval(scroll, interval);
  });
  

  // Room page:: Careful here
const roomData = {
  double: {
    description: "Cozy double rooms perfect for couples or solo travelers, featuring elegant furnishings and modern comforts.",
    rooms: [
      { image: "assets/rooms/double/1_room.jpg", name: "Double Room 1" },
      { image: "assets/rooms/double/2_room.jpg", name: "Double Room 2" },
      { image: "assets/rooms/double/3_room.jpg", name: "Double Room 3" },
      { image: "assets/rooms/double/5_room.jpg", name: "Double Room 4" },
      { image: "assets/rooms/double/9_room.jpg", name: "Double Room 5" },
      { image: "assets/rooms/double/10_room.jpg", name: "Double Room 6" },
      { image: "assets/rooms/double/11_room.jpg", name: "Double Room 7" },
    ]
  },
  triple: {
    description: "Spacious triple rooms ideal for small groups or families, offering comfort and style.",
    rooms: [
      { image: "assets/rooms/triple/4_room.jpg", name: "Triple Room 1" },
      { image: "assets/rooms/triple/7_room.jpg", name: "Triple Room 2" },
    ]
  },
  apartment: {
    description: "Fully equipped apartment designed for extended stays and extra privacy.",
    rooms: [
      { image: "assets/rooms/apartment/12_room.jpg", name: "Apartment" },
      { image: "assets/rooms/apartment/13_room.jpg", name: "Apartment" }, 
    ]
  },
};

function loadRooms(category) {
  const grid = document.getElementById("roomGrid");
  const title = document.getElementById("room-category-title");
  const description = document.getElementById("room-category-description");

  title.textContent = `${category.charAt(0).toUpperCase() + category.slice(1)} Rooms`;
  description.textContent = roomData[category].description;

  grid.innerHTML = "";
  roomData[category].rooms.forEach(room => {
    const card = `
      <div class="relative rounded-lg overflow-hidden shadow-lg">
        <img onclick="openImageModal('${room.image}', '${room.name}')" src="${room.image}" alt="${room.name}" class="w-full h-64 object-cover cursor-[zoom]">
        <div class="absolute bottom-16 w-full text-center bg-yellow-950 bg-opacity-20 py-2">
          <p class="text-white text-lg font-semibold">${room.name}</p>
        </div>
        <button class="absolute bottom-4 left-1/2 -translate-x-1/2 bg-yellow-950 text-white px-4 py-2 rounded">
          Reserve
        </button>
      </div>
    `;
    grid.innerHTML += card;
  });
}

// Load default room category if on room page
document.getElementById("categoryFilter")?.addEventListener("change", (e) => {
  loadRooms(e.target.value);
});

// Initialize with default category
if(document.getElementById("categoryFilter")) {
  loadRooms("double");
}

// Open fullscreen images on room page
function openImageModal(src, alt) {
  const modal = document.getElementById("imageModal");
  const image = document.getElementById("modalImage");

  image.src = src;
  image.alt = alt;
  modal.classList.remove("hidden");
}

function closeImageModal() {
  const modal = document.getElementById("imageModal");
  const image = document.getElementById("modalImage");

  image.src = "";
  image.alt = "";
  modal.classList.add("hidden");
}

// Preloader JS
document.addEventListener('DOMContentLoaded', () => {
  const preloader = document.getElementById('preloader');
  if (preloader) {
    preloader.classList.add('opacity-0', 'pointer-events-none');
    setTimeout(() => preloader.remove(), 500); // Allow fade-out
  }
});

// Alert Modals
function showCustomAlert(message) {
    const modal = document.getElementById("customAlertModal");
    const messageBox = document.getElementById("customAlertMessage");

    messageBox.textContent = message;
    modal.classList.remove("hidden");
}

function closeCustomAlert() {
    const modal = document.getElementById("customAlertModal");
    modal.classList.add("hidden");
}