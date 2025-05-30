const baseUrl = window.location.origin;

function loadReservePage() {
     // Create preloader
     const preloader = document.createElement('div');
     preloader.id = 'preloader';
     preloader.className = 'fixed inset-0 bg-white flex items-center justify-center z-50';
     preloader.innerHTML = `
    <div 
      class="w-16 h-16 border-4 border-yellow-950 border-t-transparent rounded-full animate-spin">
    </div>
  `;
     document.body.appendChild(preloader);
     setTimeout(() => preloader.remove(), 500);
     window.location.href = "./reserve/";
}

const rooms = [{
          id: 1,
          title: "Double Room 1",
          image: "assets/rooms/double/1_room.jpg",
          description: "Cozy double rooms perfect for couples or solo travelers, featuring elegant furnishings and modern comforts.",
          price: 160,
          status: "available"
     },
     {
          id: 2,
          title: "Double Room 2",
          image: "assets/rooms/double/2_room.jpg",
          description: "Cozy double rooms perfect for couples or solo travelers.",
          price: 160,
          status: "available"
     },
     {
          id: 3,
          title: "Double Room 3",
          image: "assets/rooms/double/3_room.jpg",
          description: "Cozy double rooms perfect for couples or solo travelers.",
          price: 160,
          status: "available"
     },
     {
          id: 4,
          title: "Double Room 4",
          image: "assets/rooms/double/9_room.jpg",
          description: "Cozy double rooms perfect for couples or solo travelers.",
          price: 160,
          status: "available"
     },
     {
          id: 5,
          title: "Double Room 5",
          image: "assets/rooms/double/5_room.jpg",
          description: "Cozy double rooms perfect for couples or solo travelers.",
          price: 160,
          status: "available"
     },
     {
          id: 6,
          title: "Double Room 6",
          image: "assets/rooms/double/6_room.jpg",
          description: "Cozy double rooms perfect for couples or solo travelers.",
          price: 160,
          status: "available"
     },
     {
          id: 7,
          title: "Double Room 7",
          image: "assets/rooms/double/10_room.jpg",
          description: "Cozy double rooms perfect for couples or solo travelers.",
          price: 160,
          status: "available"
     },
     {
          id: 8,
          title: "Triple Room 1",
          image: "assets/rooms/triple/4_room.jpg",
          description: "Spacious triple rooms ideal for small groups or families, offering comfort and style",
          price: 210,
          status: "available"
     },
     {
          id: 9,
          title: "Triple Room 2",
          image: "assets/rooms/triple/7_room.jpg",
          description: "Spacious triple rooms ideal for small groups or families, offering comfort and style",
          price: 210,
          status: "available"
     },
     {
          id: 10,
          title: "Apartment",
          image: "assets/rooms/apartment/12_room.jpg",
          description: "Fully equipped apartments designed for extended stays and extra privacy.",
          price: 300,
          status: "filled"
     },
];

const cart = [];
let daysSelected = 0;

function renderRooms() {
     const container = document.getElementById('rooms-container');
     container.innerHTML = '';
     rooms.forEach(room => {
          const card = document.createElement('div');
          card.className = "border rounded shadow p-4 bg-white";
          card.innerHTML = `
    <img src="${room.image}" class="w-full h-48 object-cover rounded cursor-zoom-in" onclick="openReserveImageModal('${room.image}')" />
    <h4 class="text-lg font-bold text-yellow-950 mt-2">${room.title}</h4>
    <p class="text-sm text-gray-600 my-2">${room.description}</p>
    <p class="font-semibold text-yellow-950">${room.price} Lei/night</p>
    <button 
        ${room.status !== "available" ? "disabled" : ""}
        onclick="${room.status === "available" ? `addToCart(${room.id})` : ""}"
        class="mt-3 ${
            room.status === "available"
                ? "bg-yellow-950 hover:opacity-90"
                : "bg-gray-400 cursor-not-allowed"
        } text-white px-4 py-2 rounded"
    >
        ${room.status === "available" ? "Add to Cart" : "Unavailable"}
    </button>
`;
          container.appendChild(card);
     });
}

function addToCart(id) {
     if (daysSelected < 1) {
          showCustomAlert("Please select a valid date range first.");
          //   Scroll to the date selector 
          document.getElementById('dateSelector')?.scrollIntoView({
               behavior: 'smooth',
               block: 'center'
          });
          return;
     }
     const room = rooms.find(r => r.id === id);
     cart.push(room);
     updateCart();
}

function updateCart() {
     const ul = document.getElementById("cart-items");
     ul.innerHTML = '';
     let total = 0;

     cart.forEach((item, index) => {
          const itemCost = item.price * daysSelected;
          total += itemCost;

          const li = document.createElement('li');
          li.classList.add('flex', 'justify-between', 'items-center');
          li.innerHTML = `
            <div>
                ${item.title}<br>
                <small>Lei${item.price}/night x ${daysSelected} = <strong>€${itemCost}</strong></small>
            </div>
            <button onclick="removeFromCart(${index})" class="text-red-600 font-bold text-lg ml-4 hover:opacity-80">×</button>
        `;
          ul.appendChild(li);
     });

     document.getElementById("total-price").textContent = `${total} Lei`;
}

function openReserveImageModal(src) {
     const modal = document.getElementById('imageModal');
     document.getElementById('modalImage').src = src;
     modal.classList.remove('hidden');
}

function closeImageModal() {
     document.getElementById('imageModal').classList.add('hidden');
}

// Initialize date picker
const picker = new Litepicker({
     element: document.getElementById('dateRange'),
     singleMode: false,
     setup: (picker) => {
          picker.on('selected', (start, end) => {
               const startDate = new Date(start.format('YYYY-MM-DD'));
               const endDate = new Date(end.format('YYYY-MM-DD'));
               daysSelected = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
               updateCart();
          });
     }
});

function removeFromCart(index) {
     cart.splice(index, 1);
     updateCart();
}

function getNumberOfNights() {
     const rangeInput = document.getElementById("dateRange").value;

     if (!rangeInput.includes(" - ")) return 0;

     const [checkinStr, checkoutStr] = rangeInput.split(" - ").map(s => s.trim());
     const checkin = new Date(checkinStr);
     const checkout = new Date(checkoutStr);

     if (isNaN(checkin) || isNaN(checkout)) return 0;

     const msPerDay = 1000 * 60 * 60 * 24;
     const nights = Math.round((checkout - checkin) / msPerDay);

     return nights > 0 ? nights : 0;
}


function calculateTotal() {
     const nights = getNumberOfNights();
     if (nights === 0) return 0;

     return cart.reduce((total, item) => {
          return total + (item.price * nights);
     }, 0);
}


async function finalizeReservation() {
     if (cart.length === 0) {
          showCustomAlert("Your cart is empty.");
          return;
     }

     const emailInput = document.getElementById("userEmail");
     const phoneInput = document.getElementById("userPhone");
     const email = emailInput?.value.trim();
     const phone = phoneInput?.value.trim();

     if (!email || !phone) {
          showCustomAlert("Please enter both your email and phone number.");
          return;
     }
     const rangeInput = document.getElementById("dateRange").value;

     if (!rangeInput.includes(" - ")) showCustomAlert("Invalid date range.");

     const [checkinStr, checkoutStr] = rangeInput.split(" - ").map(s => s.trim());
     const checkin = new Date(checkinStr);
     const checkout = new Date(checkoutStr);
     
     const preloader = document.createElement('div');
     preloader.id = 'preloader';
     preloader.className = 'fixed inset-0 bg-white flex items-center justify-center z-50';
     preloader.innerHTML = `
          <div class="w-16 h-16 border-4 border-yellow-950 border-t-transparent rounded-full animate-spin"></div>
     `;
     document.body.appendChild(preloader);
     setTimeout(() => preloader.remove(), 500);
     // Construct form data
     const data = {
          userEmail: email,
          userPhone: phone,
          action: "reserve",
          checkin,
          checkout,
          reservationData: JSON.stringify({
               cart,
               total: calculateTotal(),
               nights: getNumberOfNights()
          })
     };

     // Send with AJAX (fetch)
     const submitUrl = baseUrl.includes("localhost") ?
          `${baseUrl}/pensiun/functions/` :
          `${baseUrl}functions/`;

     await fetch(submitUrl, {
               method: "POST",
               headers: {
                    "Content-Type": "application/json"
               },
               body: JSON.stringify(data)
          })
          .then(response => response.json()) // PHP returns JSON
          .then(result => {
               if (result.success) {
                    showCustomAlert("Your reservation is being processed, check your email for confirmation.");
                    // Clear UI
                    emailInput.value = "";
                    phoneInput.value = "";
                    cart.length = 0;
                    updateCart();
               } else {
                    showCustomAlert(result.message || "Reservation failed.");
               }
          })
          .catch(error => {
               console.error("Error:", error);
               showCustomAlert("An error occurred while submitting your reservation.");
          });
}