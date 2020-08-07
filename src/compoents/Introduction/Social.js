import React from "react";
import "./Social.scss";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome"
import {icons} from "./Icons";

const Icon = ({item}) => <li className="pl-3 pr-8">
    <a href={item.url} target="_blank">
        <FontAwesomeIcon icon={item.iconName} className="icon text-4xl" />
    </a>
</li>

export const Social = () => <div className="block w-full pt-16 pb-2">
    <ul className="flex justify-center m-2 icons">
        {icons.map(item => <Icon item={item} />)}
    </ul>
</div>

