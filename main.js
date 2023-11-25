const add = document.querySelector("#add");
const courseCode = document.querySelector("#course-code");
const unitLoad = document.querySelector("#unit-load");
const grade = document.querySelector("#grade");
const tbody = document.querySelector("#tbody");
const tfoot = document.querySelector("#tfoot");
const table = document.querySelector("#table");
const calcGp = document.querySelector("#calc-gp");
const clear = document.querySelector("#clear");

let gpArry = [];

add.addEventListener("click", () => {
  if (
    courseCode.value === "" ||
    unitLoad.value <= 0 ||
    grade.selectedIndex === 0
  ) {
    alert("Wrong input, check and try again");
  } else {
    const tr = document.createElement("tr");
    const tdCourseCode = document.createElement("td");
    tdCourseCode.innerHTML = courseCode.value;
    const tdUnitLoad = document.createElement("td");
    tdUnitLoad.innerHTML = unitLoad.value;
    const tdGrade = document.createElement("td");
    tdGrade.innerHTML = grade.options[grade.selectedIndex].text;
    tr.appendChild(tdCourseCode);
    tr.appendChild(tdUnitLoad);
    tr.appendChild(tdGrade);
    tbody.appendChild(tr);
    table.classList.remove("display-none");
    calcGp.classList.remove("display-none");
    clear.classList.remove("display-none");

    const gpa = calculateGPA(); // Calculate GPA
    gpArry.push({
      courseCode: courseCode.value,
      unitLoad: unitLoad.value,
      grade: grade.options[grade.selectedIndex].value,
      gpa: gpa,
    });

    console.log(gpArry);
    courseCode.value = "";
    unitLoad.value = "";
    grade.selectedIndex = "0";
  }
});

calcGp.addEventListener("click", () => {
  console.log('Calc GP button clicked');
  let unitLoads = 0,
    productOfUnitLoadsAndGrades = 0,
    sumOfProductOfUnitLoadsAndGrades = 0;

  gpArry.forEach((result) => {
    unitLoads += parseInt(result.unitLoad);
    productOfUnitLoadsAndGrades =
      parseInt(result.unitLoad) * parseInt(result.grade);
    sumOfProductOfUnitLoadsAndGrades += productOfUnitLoadsAndGrades;
  });

  const GPA = (sumOfProductOfUnitLoadsAndGrades / unitLoads).toFixed(2);

  // Add GPA to the data before sending to save_data.php
  gpArry.forEach((result) => {
    result.gpa = GPA;
  });

  console.log('Before fetch:', gpArry);

  // Send data to save_data.php using Fetch API
  fetch('save_data.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(gpArry),
  })
  .then(response => response.json())
  .then(data => {
    console.log('Data saved successfully:', data);
  })
  .catch(error => {
    console.error('Error saving data:', error);
  });

  const tr = document.createElement("tr");

  tdTotalUnitLoad = document.createElement("td");
  tdTotalUnitLoad.innerHTML = `your total unit load is ${unitLoads}`;

  tdGpa = document.createElement("td");
  tdGpa.setAttribute("colspan", "2");
  tdGpa.innerHTML = `your GPA is ${GPA}`;

  tr.appendChild(tdTotalUnitLoad);
  tr.appendChild(tdGpa);
  if (tfoot.querySelector("tr") !== null) {
    tfoot.querySelector("tr").remove();
  }
  tfoot.appendChild(tr);
});

clear.addEventListener("click", () => {
  gpArry = [];
  tbody.querySelectorAll("*").forEach((child) => child.remove());
  if (tfoot.querySelector("tr") !== null) {
    tfoot.querySelector("tr").remove();
  }

  table.classList.add("display-none");
  calcGp.classList.add("display-none");
  clear.classList.add("display-none");
});

function calculateGPA() {
  let totalGradePoints = 0;
  let totalUnitLoads = 0;

  gpArry.forEach((result) => {
    totalGradePoints += parseInt(result.grade) * parseInt(result.unitLoad);
    totalUnitLoads += parseInt(result.unitLoad);
  });

  return (totalGradePoints / totalUnitLoads).toFixed(2);
}
