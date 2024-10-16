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

    calcular(5, 3, "+");
    calcular(10, 2, "/");
    calcular("hola", 2, "*");
    calcular(10, 2, "*");
    calcular(5, 0, "/");
    calcular(5, 2, "/");