<?php
//View : s'occuper de l'affichage de la page listant les agents
class ViewAccueil
{
    //ATTRIBUT
    private array $listAgents = [];
    private string $message = "";
    private array $tiers = [];
    private array $archetypes = [];

    //GETTER ET SETTER
    /**
     * Get the value of listAgents
     *
     * @return array
     */
    public function getListAgents(): array
    {
        return $this->listAgents;
    }

    /**
     * Set the value of listAgents
     *
     * @param array $listAgents
     *
     * @return self
     */
    public function setListAgents(array $listAgents): self
    {
        $this->listAgents = $listAgents;
        return $this;
    }

    /**
     * Get the value of message
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    //METHOD
    //Affichage de la page
    public function display()
    {
?>
<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Liste des agents</title>
    </head>
    <body>
        <main>
            <section>
            <h2>Enregistrement d'un agent</h2>
            <form action="" method="post">
                <label for="name">Nom : <input id="name" type="text" name="name"></label>
                <label for="dob">Date de naissance : <input id="dob" type="text" name="dob"></label>
                <label for="tier">Tier : <select name="tier" id="tier">
                    <?php
                        //Affichage des options pour le Tier
                        foreach($this->tiers as $tier){
                    ?>
                            <option value="<?php echo(htmlspecialchars($tier['Id_Tier'])) ?>"><?php echo(htmlspecialchars($tier['tier'])) ?></option>
                    <?php
                        }
                    ?>
                    </select>
                </label>
                <label for="archetype">Archetype : <select name="archetype" id="archetype">
                    <?php
                        //Affichage des options pour le Tier
                        foreach($this->archetypes as $archetype){
                    ?>
                            <option value="<?php echo(htmlspecialchars($archetype['Id_Archetype'])) ?>"><?php echo(htmlspecialchars($archetype['archetype'])) ?></option>
                    <?php
                        }
                    ?>
                    </select>
                </label>
                <input type="submit" name="submit">
            </form>
            <p><?php echo($this->message) ?></p>
        </section>
            <section>
                <h2>Liste des agents</h2>
                <ul>
                    <?php foreach ($this->listAgents as $agent) { ?>
                        <li><?php echo htmlspecialchars($agent['name']) . " - " . htmlspecialchars($agent['archetype']) . " - " . htmlspecialchars($agent['dob']) . " - " . htmlspecialchars($agent['created_at']) . " - " . htmlspecialchars($agent['tier']) ?></li>
                    <?php } ?>
                </ul>
                <p><?php echo $this->message ?></p>
            </section>
        </main>
    </body>
    </html>
<?php
}
}
?>