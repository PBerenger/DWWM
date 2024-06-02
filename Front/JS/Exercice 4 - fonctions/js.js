// let mois = 3;
// let nomDuMois;

// switch (mois) {
//     case 1:
//       nomDuMois = ["Janvier", "31"];
//         break;
//     case 2:
//       nomDuMois = ["Février", "28", "29"];
//         break;
//     case 3:
//       nomDuMois = ["Mars", "31"];
//         break;
//     case 4:
//       nomDuMois = ["Avril", "30"];
//         break;
//     case 5:
//       nomDuMois = ["Mai", "31"];
//         break;
//     case 6:
//       nomDuMois = ["Juin", "30"];
//         break;
//     case 7:
//       nomDuMois = ["Juillet", "31"];
//         break;
//     case 8:
//       nomDuMois = ["Août", "31"];
//         break;
//     case 9:
//       nomDuMois = ["Septembre", "30"];
//         break;
//     case 10:
//       nomDuMois = ["Octobre", "31"];
//         break;
//     case 11:
//       nomDuMois = ["Novembre", "30"];
//         break;
//     case 12:
//       nomDuMois = ["Décembre", "31"];
//         break;

//     default:
//       nomDuMois = "Mois invalide";
//     }


//     console.log("Ce mois de" + " " + nomDuMois[0] + " " + "contient" + " " + nomDuMois[1] + " " + "jours" + ".");



// CORRECTION

function nombreDeJours(num) {
  let year = new Date().getFullYear()
  let nombreDeJours;

  switch (num) {
    case 1:
      nombreDeJours = 31;
      break;
    case 2:
      if ((year % 4 === 0 && year % 100 > 0) || (year % 400 === 0)) {
        nombreDeJours = "29";
      }
      else {
        nombreDeJours = "28";
      }

      break;
    case 3:
      nombreDeJours = 31;
      break;
    case 4:
      nombreDeJours = 30;
      break;
    case 5:
      nombreDeJours = 31;
      break;
    case 6:
      nombreDeJours = 30;
      break;
    case 7:
      nombreDeJours = 31;
      break;
    case 8:
      nombreDeJours = 31;
      break;
    case 9:
      nombreDeJours = 30;
      break;
    case 10:
      nombreDeJours = 31;
      break;
    case 11:
      nombreDeJours = 30;
      break;
    case 12:
      nombreDeJours = 31;
      break;
    default:
      nombreDeJours = "mois invalide";
  }

  console.log("nombre de jour : " + nombreDeJours);
}

nombreDeJours(2);

console.log(2024 % 4);