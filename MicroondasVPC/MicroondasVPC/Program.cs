﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MicrooondasVPC
{
    class Program
    {
        static void Main(string[] args)
        {
            int tempoAquecimento;
            string opcaoMenu;
            object[] listaOpcoesAlimentos = {
                ["Pipoca", "70", "4"],
                ["Pizza", "100", "6"],
                ["Lasanha", "105", "8"],
                ["Brigadeiro", "90", "9"],
                ["Descongelar", "120", "10"]
            };

            do
            {
                Console.Clear();
                Console.WriteLine("Microondas VPC");
                Console.WriteLine("Menu: ");
                Console.WriteLine("1 a 120 - Segundos Para Aquecer");
                Console.WriteLine("R - Aquecimento Rápido");
                Console.WriteLine("O - Opções Alimentos");
                Console.WriteLine("E - Encerrar");
                Console.WriteLine("Digite a Opção Desejada: ");
                opcaoMenu = Console.ReadLine();
                opcaoMenu = opcaoMenu.ToUpper();

                if (Equals(opcaoMenu, "R"))
                {
                    tempoAquecimento = 30;
                    Program.aquecer(tempoAquecimento, 8);
                }
                else if (Int32.TryParse(opcaoMenu, out tempoAquecimento))
                {
                    Program.aquecer(tempoAquecimento, 0);
                       
                }
                else if (Equals(opcaoMenu, "O"))
                {
                    string opcaoAlimento;
                    do
                    {
                        Console.Clear();
                        Console.WriteLine("Opções de Alimentos");
                        Program.desenharLinha();
                        foreach (object itemAlimento in listaOpcoesAlimentos)
                        {
                            Console.WriteLine(itemAlimento);
                        }
                        Program.desenharLinha();
                        Console.WriteLine("Digite o Alimento Desejado: ");
                        opcaoAlimento = Console.ReadLine();
                        //Program.aquecer();

                    } while (opcaoAlimento != "E");
                }
                else if (Equals(opcaoMenu, "E"))
                {
                    Program.apagarTelaAguardarEnter("Microondas Encerrado!");
                }
                else
                {
                    Program.apagarTelaAguardarEnter("Função inválida!");
                }
                    

            } while (opcaoMenu != "E");
           
        }

        public static void aquecer(int tempoAquecimento, int valorPotencia)
        {
            int tempoMaximoDeAquecimentoEmSegundos = 120;
            int tempoMinimoDeAquecimentoEmSegundos = 1;
            int valorMaximoDePotencia = 10;
            int valorMinimoDePotencia = 1;

            if (tempoAquecimento >= tempoMinimoDeAquecimentoEmSegundos && tempoAquecimento <= tempoMaximoDeAquecimentoEmSegundos)
            {
                if (valorPotencia == 0)
                {
                    do
                    {
                        Console.Clear();
                        Console.WriteLine("Aquecer " + tempoAquecimento + " Segundos");
                        Program.desenharLinha();
                        Console.WriteLine("Digite a potencia de aquecimento (" + valorMinimoDePotencia + " - " + valorMaximoDePotencia + "): ");
                        valorPotencia = Convert.ToInt32(Console.ReadLine());

                    } while (valorPotencia > valorMaximoDePotencia || valorPotencia < valorMinimoDePotencia);
                }

                Console.Clear();
                Program.desenharLinha();
                Console.WriteLine("Aquecendo " + tempoAquecimento + " segundos na potência " + valorPotencia + "!");
                Console.ReadLine();
            }
            else
            {
                Program.apagarTelaAguardarEnter("Tempo em Segundos Inválido!");
            }
        }

        public static void apagarTelaAguardarEnter(string frase)
        {
            Console.Clear();
            Console.WriteLine(frase);
            Console.ReadLine();
        }
        public static void desenharLinha()
        {
            Console.WriteLine("--------------------------------------------------------");
        }
    }
}
