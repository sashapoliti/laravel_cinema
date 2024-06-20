import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);

import { Chart } from 'chart.js/auto';


const side = document.getElementById('sidebar');
const but = document.getElementById('closeSidebar');
const icon = but.querySelector('.fa-solid'); // Get the icon element within the button

but.addEventListener('click', () => {
  side.classList.toggle('d-none');

  icon.classList.toggle('fa-chevron-left'); // Toggle between left and right icons
  icon.classList.toggle('fa-chevron-right'); // Toggle between left and right icons
});




const deleteSubmitButtons = document.querySelectorAll(".delete-button");

deleteSubmitButtons.forEach((button) => {
  button.addEventListener("click", (event) => {
    event.preventDefault();

    const dataTitle = button.getAttribute("data-item-title");

    const modal = document.getElementById("deleteModal");

    const bootstrapModal = new bootstrap.Modal(modal);
    bootstrapModal.show();

    const modalItemTitle = modal.querySelector("#modal-item-title");
    modalItemTitle.textContent = dataTitle;

    const buttonDelete = modal.querySelector("button.bg-bordeaux");

    buttonDelete.addEventListener("click", () => {
      button.parentElement.submit();
    });
  });
});

const checkSlot = document.getElementById('checkSlot');
const selectedDate = document.getElementById('projectdate');
if (checkSlot) {
  checkSlot.addEventListener('change', (event) => {
    //console.log(event.target.value);
    //console.log(selectedDate.value);
    window.axios.get(`http://127.0.0.1:8000/api/freeslots?rid=${event.target.value}&pdate=${selectedDate.value}`)
      .then((response) => {
        //console.log(response.data);
      
        const availablesSlots = response.data.results;
        console.log(availablesSlots);
        //dobbiamo ciclare sulla array delle proiezioni e se slot_id = option.value allora aggiungiamo l'attributo disabled all'opzione
        const mySelect = document.getElementById('slot_id');
        
        availablesSlots.forEach(slot => {
          console.log(slot.time_slot);
          mySelect.innerHTML += `
                <option class="slotOption" value="${ slot.id }">
                    ${slot.time_slot}
                </option>
            `;
        });
        
       
      //   busySlots.forEach((slot) => {


      //   //   allSlotOptions.forEach((option) => {
      //   //     console.log(option.value);
      //   //     if (option.value === slot.id) {
      //   //       option.setAttribute('disabled');
      //   //   }
      //   // });
      //   });
      })
      .catch((error) => {
        //console.error('Error fetching slots:', error);
      });
  });
}

//

// myAreaChart

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Guadagni",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgb(255, 0, 0)",
      pointRadius: 3,
      pointBackgroundColor: "rgb(255, 0, 0)",
      pointBorderColor: "rgb(255, 0, 0)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgb(255, 0, 0)",
      pointHoverBorderColor: "rgb(255, 0, 0)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 30,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10

    }
  }
});

// Pie Chart 
var ctx1 = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx1, {
  type: 'doughnut',
  data: {
    labels: ["Direct", "Referral", "Social"],
    datasets: [{
      data: [55, 30, 15],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});


if (image) {
  image.addEventListener("change", () => {
    //console.log(image.files[0]);
    //prendi elemento img dove voglio vedere anteprima
    const preview = document.getElementById('upload_preview');
    //creo nuovo oggetto file reader
    const objFileReader = new FileReader();
    //uso il metodo readAsDataURL dell'oggetto creato per leggere il file
    objFileReader.readAsDataURL(image.files[0]);
    //al termine della lettura del file quindi dopo .onload
    objFileReader.onload = function (event) {
      //metto nel campo src della preview l'immagine caricata e letta precedentemente
      preview.src = event.target.result;
    }
  });
}