//
//  ViewController.swift
//  bingoDoGaiola
//
//  Created by Vítor Pires Corrêa on 29/08/19.
//  Copyright © 2019 VitorPC. All rights reserved.
//

import UIKit

class ViewController: UIViewController {
 
    //variavel deve possuir mais 1 ao valor do mundo real, devido aos 0 possivelmente gerados
    //deve ser o mesmo valor para a atribuição das frases de efeito
    var valorMaximoDoBingo = 76
    var frasesDeEfeito = [String](repeating: "", count: 76)
    var numerosSorteados = [0]
    let corVermelha = UIColor(red: 0.79, green: 0.01, blue: 0.00, alpha:1.0)
    let corBranca = UIColor(red: 1.0, green: 1.0, blue: 1.0, alpha: 1.0)
    
    override var preferredStatusBarStyle: UIStatusBarStyle {
        return .lightContent
    }
 
    override func viewDidLoad() {
        super.viewDidLoad()
        atribuirFrasesDeEfeito()
        comecarJogo()
    }
    
    func atribuirFrasesDeEfeito() {
        frasesDeEfeito[1] = "O Começo de Jogo"
        frasesDeEfeito[2] = "Solito Dois"
        frasesDeEfeito[3] = "Casal Feliz!"
        frasesDeEfeito[4] = "Solito Quatro"
        frasesDeEfeito[5] = "Solito Cinco"
        frasesDeEfeito[6] = "Meia Dúzia!"
        frasesDeEfeito[7] = "Machadinha Solitária!"
        frasesDeEfeito[8] = "Solito Oito"
        frasesDeEfeito[9] = "Solito Nove"
        frasesDeEfeito[10] = "Razinhu Dez!"
        frasesDeEfeito[11] = "As Pernas da Bonitona!"
        frasesDeEfeito[12] = "Uma Dúzia!"
        frasesDeEfeito[13] = "É Sexta-Feira!"
        frasesDeEfeito[17] = "O Leão tá Solto!"
        frasesDeEfeito[22] = "Dois Patinhos na Lagoa"
        frasesDeEfeito[24] = "Rapazinho alegre!"
        frasesDeEfeito[25] = "Dia de Natal"
        frasesDeEfeito[26] = "O Holandês!"
        frasesDeEfeito[30] = "Idade do Sucesso!"
        frasesDeEfeito[33] = "Agradeço a Ele toda a vez!"
        frasesDeEfeito[38] = "Justiça de Mato Grosso!"
        frasesDeEfeito[39] = "Começou a Guerra!"
        frasesDeEfeito[40] = "Tempo de Quaresma!"
        frasesDeEfeito[45] = "Acabou a Guerra!"
        frasesDeEfeito[50] = "A Cinquentona!"
        frasesDeEfeito[51] = "Boa Ideia!"
        frasesDeEfeito[55] = "Cachorrinhos do Padre"
        frasesDeEfeito[61] = "Um Homem no Espaço"
        frasesDeEfeito[66] = "Número do Coisa Ruim!"
        frasesDeEfeito[69] = "Oh o Respeito!"
        frasesDeEfeito[70] = "Razão Setenta!"
        frasesDeEfeito[75] = "O Final de Jogo"
    }
    
    func comecarJogo() {
        self.numerosSorteados.removeAll()
        self.numerosSorteados = [0]
        labelLetraNumeroSorteado.isHidden = true
        labelLetraNumeroSorteado.layer.zPosition = 1
        labelNumeroSorteado.layer.zPosition = 1
        bolaBingo.layer.zPosition = 0
        bolaBingo.isHidden = true
        labelNumeroSorteado.textColor = corVermelha
        labelNumeroSorteado.text = "INÍCIO"
        labelFraseEfeito.text = "Lá vem a primeira bola!"
    }
    
    @IBOutlet weak var bolaBingo: UIImageView!
    @IBOutlet weak var labelLetraNumeroSorteado: UILabel!
    @IBOutlet weak var labelNumeroSorteado: UILabel!
    @IBOutlet weak var labelFraseEfeito: UILabel!
    
    @IBAction func botaoRecomecar(_ sender: Any) {
        
        let alertaRecomecarJogo = UIAlertController(title: "Recomeçar o Jogo?", message: "Todos os números serão apagados para recomeçar a partida.", preferredStyle: .alert)
        
        alertaRecomecarJogo.addAction(UIAlertAction(title: "Cancelar", style: .default, handler: nil))
        alertaRecomecarJogo.addAction(UIAlertAction(title: "Recomeçar", style: .destructive, handler: { action in
            self.comecarJogo()
        }))
        
        self.present(alertaRecomecarJogo, animated: true)
    }

    @IBAction func botaoGerarNumero(_ sender: Any) {
        
        var numeroJaSorteado = false
        
        if  (numerosSorteados.count)+1 <= valorMaximoDoBingo {
            repeat {
                numeroJaSorteado = false
                let numeroTemp = arc4random_uniform(UInt32(valorMaximoDoBingo));
                print(numeroTemp)
                numerosSorteados.forEach { numeroDoArray in
                    if numeroTemp == numeroDoArray {
                        numeroJaSorteado = true
                    }
                }
                
                if numeroJaSorteado == false {
                    bolaBingo.isHidden = false
                    numerosSorteados.append(Int(numeroTemp))
                    if (numeroTemp >= 1 && numeroTemp <= 15) {
                        labelLetraNumeroSorteado.text = "B"
                    }
                    else if (numeroTemp >= 16 && numeroTemp <= 30) {
                        labelLetraNumeroSorteado.text = "I"
                    }
                    else if (numeroTemp >= 31 && numeroTemp <= 45) {
                        labelLetraNumeroSorteado.text = "N"
                    }
                    else if (numeroTemp >= 46 && numeroTemp <= 60) {
                        labelLetraNumeroSorteado.text = "G"
                    }
                    else {
                        labelLetraNumeroSorteado.text = "O"
                    }
                    labelLetraNumeroSorteado.isHidden = false
                    labelNumeroSorteado.text = String(numeroTemp)
                    labelNumeroSorteado.textColor = corBranca
                    labelFraseEfeito.text = frasesDeEfeito[Int(numeroTemp)]
                    print(numerosSorteados)
                }
                
            } while numeroJaSorteado == true && numerosSorteados.count < valorMaximoDoBingo
        }
        else {
            bolaBingo.isHidden = true
            labelLetraNumeroSorteado.isHidden = true
            labelNumeroSorteado.textColor = corVermelha
            labelNumeroSorteado.text = "ACABOU"
            labelFraseEfeito.text = "Recolham o Lixão!"
        }
    }
    
    @IBAction func botaoSorteados(_ sender: Any) {
        
    }
    
}
