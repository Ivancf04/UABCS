function calcular(num1, num2, operacion) {
    num1 = parseFloat(num1);
    num2 = parseFloat(num2);
  
    if (isNaN(num1) || isNaN(num2)) {
      alert("Por favor, ingresa solo números.");
      return;
    }
  
    let resultado;
    switch (operacion) {
      case "+":
        resultado = num1 + num2;
        break;
      case "-":
        resultado = num1 - num2;
        break;
      case "*":
        resultado = num1 * num2;
        break;   
  
      case "/":
        if (num2 === 0) {
          alert("No puedes dividir entre cero.");
          return;
        } else {
          resultado = num1 / num2;
        }
        break;
      default:
        alert("Operación inválida.");
        return;
    }
  
    console.log("El resultado es:", resultado);
  }

  let num1 = prompt("Ingresa el primer numero: ");
  let num2 = prompt("Ingresa el segundo numero: ");
  let operacion = prompt("Ingresa la operacion(+ | - | * | /): ");

  calcular(num1, num2, operacion);
